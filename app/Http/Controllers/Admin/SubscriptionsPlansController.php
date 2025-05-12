<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubscriptionsPlansRequest;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class subscriptionsplansController extends Controller implements HasMiddleware
{
    public static function middleware():array{
        return [
            new Middleware('permission:delete plan',only:['destroy','hardDelete']),
            new Middleware('permission:update plan',only:['update','edit']),
            new Middleware('permission:view plan',only:['index']),
            new Middleware('permission:create plan',only:['create','store']),
        ];
    }
    //
    public function index(){
        $subscriptionsplans = SubscriptionPlan::paginate(8);
        return view('admin.subscriptionsplans.index',compact('subscriptionsplans'));
    }
    public function create(SubscriptionPlan $subscriptionPlan){

        return view('admin.subscriptionsplans.create');
    }
    public function store(SubscriptionsPlansRequest $subsPlansRequest){
        $data = $subsPlansRequest->validated();
        $SubscriptionPlan = SubscriptionPlan::create($data);
        return redirect()->route('admin.subscriptionsplans.index')->with('success', 'Gói đã được thêm thành công!');
    }
    public function edit(SubscriptionPlan $subscriptionsplan){

        return view('admin.subscriptionsplans.edit',compact('subscriptionsplan'));
    }
    public function update(SubscriptionsPlansRequest $subsPlansRequest, SubscriptionPlan $subscriptionsplan){
        $data = $subsPlansRequest->validated();
        $subscriptionsplan->update($data);
        return redirect()->route('admin.subscriptionsplans.index')->with('success', 'Gói đã được sửa thành công!');
    }
    public function destroy(SubscriptionPlan $subscriptionsplan){
        if ($subscriptionsplan){
            $subscriptionsplan->delete();
        }
        return redirect()->route('admin.subscriptionsplans.index')->with('success', 'Subscription Plan deleted successfully!');
    }
    public function hardDelete(Request $request){
        $subsplans = $request->subscriptionsplans;
        SubscriptionPlan::whereIn('id',$subsplans)->delete();
        return response()->json(['status' => 'success']);
    }
}
