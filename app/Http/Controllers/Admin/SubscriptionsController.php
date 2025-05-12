<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionsRequest;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class SubscriptionsController extends Controller implements HasMiddleware
{
    public static function middleware():array{
        return [
            new Middleware('permission:delete subscription',only:['destroy','hardDelete']),
            new Middleware('permission:update subscription',only:['update','edit']),
            new Middleware('permission:view subscription',only:['index']),
        ];

    }
    //
    public function index(){
        $subscriptions = Subscription::paginate(8);
        return view('admin.subscriptions.index',compact('subscriptions'));
    }
    public function edit(Subscription $subscription){
        $subscriptions_plans = SubscriptionPlan::all();
        $users = User::all();
        return view('admin.subscriptions.edit',compact('subscription','subscriptions_plans','users'));
    }
    public function update(SubscriptionsRequest $subsRequest, Subscription $subscription){
        $data = $subsRequest->validated();
        $subscription -> update($data);
        return redirect()->route('admin.subscriptions.index');
    }
    public function destroy(Subscription $subscription){
        if($subscription){
            $subscription->delete();
        }
        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription deleted successfully!');
    }
    public function hardDelete(Request $request){
        $subscriptions = $request->subscriptions;
        Subscription::whereIn('id',$subscriptions)->delete();
        return response()->json(['status' => 'success']);
    }
}
