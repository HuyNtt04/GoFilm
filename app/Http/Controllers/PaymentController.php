<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;
use Vnpay;

class PaymentController extends Controller
{
    public function createPayment($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        
        // Lấy thông tin đăng ký
        $amount = $subscription->plan->price;
        $orderInfo = "Thanh toán cho gói {$subscription->plan->name}";

        // Tạo dữ liệu thanh toán VNPAY
        $vnpayData = [
            'vnp_TmnCode' => 'VNPAY_MERCHANT_ID', // Mã Merchant của bạn
            'vnp_HashSecret' => 'VNPAY_SECRET_KEY', // Secret Key của bạn
            'vnp_TxnRef' => $subscription->id, // Mã tham chiếu đơn hàng
            'vnp_Amount' => $amount * 100, // Số tiền cần thanh toán (tính bằng đồng)
            'vnp_CurrCode' => 'VND', // Mã tiền tệ
            'vnp_BankCode' => 'VNPAY', // Mã ngân hàng (có thể thay đổi theo phương thức thanh toán)
            'vnp_OrderInfo' => $orderInfo, // Thông tin đơn hàng
            'vnp_ReturnUrl' => route('payment.response'), // Địa chỉ trả kết quả
            'vnp_TxnDate' => Carbon::now()->format('YmdHis'), // Thời gian giao dịch
        ];

        // Tạo URL thanh toán VNPAY
        $vnpayUrl = Vnpay::generatePaymentUrl($vnpayData);
        
        // Chuyển hướng người dùng đến trang thanh toán của VNPAY
        return redirect($vnpayUrl);
    }

    // Nhận kết quả thanh toán từ VNPAY
    public function paymentResponse(Request $request)
    {
        $vnpayResponse = $request->all();

        // Kiểm tra mã phản hồi từ VNPAY
        if ($vnpayResponse['vnp_ResponseCode'] == '00') {
            // Thanh toán thành công, cập nhật trạng thái đơn hàng
            $subscription = Subscription::findOrFail($vnpayResponse['vnp_TxnRef']);
            $subscription->payment_status = 'success';
            $subscription->save();
            
            // Cập nhật người dùng thành VIP
            $user = $subscription->user;
            $user->isPremium = 1;
            $user->save();

            return view('payment.success');
        } else {
            // Thanh toán thất bại
            return view('payment.failed');
        }
    }
}