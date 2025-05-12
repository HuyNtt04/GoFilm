<?php
// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Notification;
use App\Models\Payment;
use App\Mail\PaymentSuccessMail;
use Carbon\Carbon;

class PaymentController extends Controller
{
    protected $vnp_TmnCode = "4YIFISWH";
    protected $vnp_HashSecret = "GK7RPFEMWHKU01ODB97Z32BDRUOLBBBW";
    protected $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

    public function createPayment($subscriptionId)
    {
        $subscription = Subscription::with('plan')->findOrFail($subscriptionId);
        $amount = $subscription->plan->price;
        $vnp_TxnRef = $subscription->id;
        $vnp_OrderInfo = "Thanh toán cho gói " . $subscription->plan->name;
        $vnp_Amount = $amount * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "VNPAY";
        $vnp_IpAddr = request()->ip();
    
        $inputData = [
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => route('payment.response'),
            "vnp_TxnRef" => $vnp_TxnRef,
        ];
    
        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
    
        // Sắp xếp dữ liệu
        ksort($inputData);
    
        // Tạo chuỗi hashdata đúng cách
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= $key . "=" . $value . "&";
        }
        $hashdata = rtrim($hashdata, "&");
    
        // Tạo chữ ký
        $vnp_SecureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);
    
        $vnp_Url = $this->vnp_Url . '?' . http_build_query($inputData) . '&vnp_SecureHash=' . $vnp_SecureHash;
    
        return redirect($vnp_Url);
    }
    

    public function paymentResponse(Request $request)
    {
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';
    
        // Chỉ bỏ vnp_SecureHash, KHÔNG bỏ vnp_SecureHashType
        unset($inputData['vnp_SecureHash']);
    
        // Tạo chuỗi hashdata đúng cách
        ksort($inputData);
$hashDataArr = [];
foreach ($inputData as $key => $value) {
    $hashDataArr[] = urlencode($key) . '=' . urlencode($value);
}
$hashData = implode('&', $hashDataArr);
$secureHashCheck = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);


    
        // Tạo chữ ký phía server
        $secureHashCheck = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);
        \Log::info('VNPAY HASH:', [$vnp_SecureHash]);
        \Log::info('Server HASH:', [$secureHashCheck]);
        \Log::info('HashData:', [$hashData]);
        if ($vnp_SecureHash === $secureHashCheck && $inputData['vnp_ResponseCode'] === '00') {
            $subscription = Subscription::with('plan', 'user')->findOrFail($inputData['vnp_TxnRef']);
            $subscription->Payment_status = 1;
            $subscription->Status = 'active';
            $subscription->save();
    
            $user = $subscription->user;
            $user->isPremium = 1;
            $user->save();
    
            $notification = Notification::create([
                'content' => "Thanh toán gói {$subscription->plan->name} thành công!",
                'id_send_user' => 1,
                'id_receive_user' => $user->id,
                'status' => 1,
            ]);
            Mail::to($user->email)->send(new PaymentSuccessMail($subscription));
            Payment::create([
                'id_user' => $user->id,
                'id_noti' => $notification->id,
                'amount' => $subscription->plan->price,
                'date' => Carbon::now(),
                'method' => 'credit_card',
                'status' => 1,
            ]);
    
            return view('user.payment.success');
        } else {
            return view('user.payment.failed')->with('error', 'Thanh toán không hợp lệ hoặc chữ ký không đúng.');
        }
    }
    
    public function cancelPayment()
    {
        return view('user.payment.cancel');
    }    
}