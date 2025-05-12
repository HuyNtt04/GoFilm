<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class NotificationController extends Controller implements HasMiddleware
{
    
    public static function middleware():array{
        return [
            new Middleware('permission:delete notification',only:['destroy','hardDelete','bin']),
            new Middleware('permission:restore notification',only:['restoreS','restore']),
            new Middleware('permission:view notification',only:['index']),
            new Middleware('permission:softDelete notification',only:['xoa','softDelete'])
        ];

    }
    public function index(){
        $notifications = Notification::paginate(8);
        return view('admin.notifications.index',compact('notifications'));
    }
    public function destroy(Notification $notification){
        $notification->delete();
        return redirect()->route('admin.notifications.index')->with('success', 'Notification deleted successfully!');
    }
    public function hardDelete(Request $request){
        $notifications = $request->notifications;
        Notification::whereIn('id',$notifications)->delete();
        return response()->json(['status' => 'success']);
    }
    public function xoa(Notification $notification){
        if($notification){
            $notification->isDeleted = 1;
            $notification->save();
            return response()->json(['isDeleted' => $notification->isDeleted,'status'=>'success','Thông báo đã xóa mềm thành công!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Thông báo không tìm thấy'], 404);
    }
    public function restore(Notification $notification){
        if($notification){
            $notification->isDeleted = 0;
            $notification->save();
            return response()->json(['isDeleted' => $notification->isDeleted,'status'=>'success','Thông báo đã phục hồi thành công!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Thông báo không tìm thấy'], 404);
    }
    public function bin(){
        $notifications = Notification::where('isDeleted',1)->get();
        return view('admin.notifications.bin', compact('notifications'));
    }
    public function softDelete(Request $request){
        $notifications = $request->notifications;
        notification::whereIn('id',$notifications)->update(['isDeleted'=>1]);
        return response()->json(['status' => 'success']);
    }
    public function restoreS(Request $request){
        $notifications = $request->notifications;
        notification::whereIn('id',$notifications)->update(['isDeleted'=>0]);
        return response()->json(['status' => 'success']);
    }
}
