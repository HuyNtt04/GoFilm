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
        return redirect()->route('payment.create', $subscription->id);
    }

    // Trang thành công sau khi thanh toán
    public function success()
    {
        return view('user.subscriptions.success');
    }
}