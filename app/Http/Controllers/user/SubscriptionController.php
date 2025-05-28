<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Models\Subscription;
use App\Models\Payment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class SubscriptionController extends Controller
{
    // Hiển thị các gói đăng ký
    public function showPlans()
    {
        $plans = SubscriptionPlan::all();
        $isBlocked = !auth()->check() || !auth()->user()->isPremium;
        return view('user.subscriptions.plans', compact('plans','isBlocked'));
    }

    // Mua gói đăng ký
    public function purchasePlan($planId)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập trước khi thanh toán.');
        }

        $plan = SubscriptionPlan::findOrFail($planId);

        // Tạo đăng ký cho người dùng
        $user = Auth::user();
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addMonths((int) $plan->duration);

        $subscription = new Subscription();
        $subscription->id_user = $user->id;
        $subscription->id_plan = $plan->id;
        $subscription->Start_date = $startDate;
        $subscription->End_date = $endDate;
        $subscription->Status = 'active';
        $subscription->Payment_status = 0; // Chưa thanh toán
        $subscription->save();

        // Tạo thông báo cho người dùng (bạn có thể sửa thông báo này)
        $notification = new Notification();
        $notification->content = "Thanh toán gói {$plan->name} thành công!";
        $notification->id_send_user = 1; // Gửi từ Admin hoặc user có id = 1
        $notification->id_receive_user = $user->id;
        $notification->status = 1; // Đã xem
        $notification->save();

        // Giả sử thanh toán thành công
        $subscription->Payment_status = 1; // Đã thanh toán
        $subscription->save();

        // Tạo bản ghi thanh toán
        $payment = new Payment();
        $payment->id_user = $user->id;
        $payment->id_noti = $notification->id; // Sử dụng id của thông báo đã tạo
        $payment->amount = $plan->price;
        $payment->date = Carbon::now();
        $payment->method = 'credit_card'; // Phương thức thanh toán
        $payment->status = 1; // Thanh toán thành công
        $payment->save();

        // Cập nhật người dùng thành VIP
        $user->isPremium = 1;
        $user->save();

        return redirect()->route('subscriptions.success')->with('success', 'Thanh toán thành công, bạn đã trở thành VIP!');
    }

    // Trang thành công sau khi thanh toán
    public function success()
    {
        return view('user.subscriptions.success');
    }
}