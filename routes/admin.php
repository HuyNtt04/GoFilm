<?php

use App\Http\Controllers\Admin\EpisodesController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubscriptionsPlansController;
use App\Http\Controllers\Admin\UrlsController;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\SubscriptionsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\replyController;

Route::group(['middleware'=>['role:admin|employee','auth'],'prefix'=>'admin','as'=>'admin.'],function () {
    Route::get('/', [CateController::class, 'index'])->name('index');

    // Routes cho Category
    Route::resource('category',CateController::class);
    Route::post('/category/delete', [CateController::class, 'hardDelete'])->name('category.delete');

    // Routes cho Movie
    Route::resource('movie', MovieController::class)->except(['show']);

    Route::get('/movie/{id}/links', [MovieController::class, 'showLinks'])->name('movie.links');
    Route::get('/movie/{id}/detail', [MovieController::class, 'getMovieDetail'])->name('movie.detail');
    Route::get('/movie/bin', [MovieController::class, 'bin'])->name('movie.bin');
    Route::post('/movie/{movie}/xoa', [MovieController::class, 'xoa']);
    Route::post('/movie/{movie}/restore', [MovieController::class, 'restore'])->name('movie.restore');
    Route::post('/movie/bin/restoreS', [MovieController::class, 'restoreS'])->name('movie.bin.restore');
    Route::post('/movie/bin/delete', [MovieController::class, 'hardDelete'])->name('movie.bin.delete');
    Route::post('/movie/del', [MovieController::class, 'softDelete'])->name('movie.del');
    
    // Routes cho Episodes
    Route::prefix('tvseries/{movie}')->group(function(){
        Route::resource('episodes',EpisodesController::class);
        Route::post('/episodes/delete', [EpisodesController::class, 'hardDelete'])->name('episodes.delete');
    });
    // Routes cho Urls
    Route::prefix('episodes/{episode}')->group(function(){
        Route::resource('urls',UrlsController::class);
        Route::post('/episodes/delete', [UrlsController::class, 'hardDelete'])->name('urls.delete');
    });
    // Routes cho Quyền
    Route::resource('permissions',App\Http\Controllers\Admin\PermissionController::class);
    Route::post('/permissions/check-unique',[App\Http\Controllers\Admin\PermissionController::class,'checkUnique'])->name('permissions.check-unique');
    Route::delete('permissions/{permission}/delete',[App\Http\Controllers\Admin\PermissionController::class,'destroy']);
    Route::post('/permissions/delete', [PermissionController::class, 'hardDelete'])->name('permissions.delete');
    // Routes cho Vai tro
    Route::resource('roles',App\Http\Controllers\Admin\RoleController::class);
    Route::delete('roles/{role}/delete',[App\Http\Controllers\Admin\RoleController::class,'destroy'])
        ->middleware('permission:delete role');
    Route::post('/roles/delete', [RoleController::class, 'hardDelete'])->name('roles.delete');

    Route::get('roles/{role}/give-permissions',[App\Http\Controllers\Admin\RoleController::class,'addPermissionToRole'])->name('roles.addPermsToRole');
    Route::put('roles/{role}/give-permissions',[App\Http\Controllers\Admin\RoleController::class,'givePermissionToRole']);
    // Routes cho Episode
    Route::prefix('tvseries/{movie}')->group(function(){
        Route::resource('episodes',EpisodesController::class);
        Route::post('/episodes/delete', [EpisodesController::class, 'hardDelete'])->name('episodes.delete');
    });
    // Routes cho Url
    Route::prefix('episodes/{episode}')->group(function(){
        Route::resource('urls',UrlsController::class);
        Route::post('/urls/delete', [UrlsController::class, 'hardDelete'])->name('urls.delete');
    });
    // Routes cho User
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);
    Route::delete('users/{user}/delete',[App\Http\Controllers\Admin\UserController::class,'destroy']);
    Route::post('/users/delete', [UserController::class, 'hardDelete'])->name('users.delete');

    // Routes cho Notifications
    Route::resource('notifications',App\Http\Controllers\Admin\NotificationController::class);
    Route::post('/notifications/delete', [Notification::class, 'hardDelete'])->name('notifications.delete');
    Route::get('/notification/bin', [NotificationController::class, 'bin'])->name('notifications.bin');
    Route::post('/notification/{notification}/xoa', [NotificationController::class, 'xoa']);
    Route::post('/notification/{notification}/restore', [NotificationController::class, 'restore'])->name('notifications.restore');
    Route::post('/notification/bin/restoreS', [NotificationController::class, 'restoreS'])->name('notifications.bin.restore');
    Route::post('/notification/bin/delete', [NotificationController::class, 'hardDelete'])->name('notifications.bin.delete');
    Route::post('/notification/del', [NotificationController::class, 'softDelete'])->name('notifications.del');
    
    // Routes cho Subscriptions
    Route::resource('subscriptions',App\Http\Controllers\Admin\SubscriptionsController::class)->except('show');
    Route::post('/subscriptions/delete', [SubscriptionsController::class, 'hardDelete'])->name('subscriptions.delete');
    // Routes cho Subscriptions_Plans
    Route::resource('subscriptionsplans',App\Http\Controllers\Admin\SubscriptionsPlansController::class);
    Route::post('/subscriptionsplans/delete', [SubscriptionsPlansController::class, 'hardDelete'])->name('subscriptionsplans.delete');
    // Routes cho Comments
    Route::resource('comments',App\Http\Controllers\Admin\CommentController::class)->except(['create','store','show']);
    Route::post('/comments/delete', [CommentController::class, 'hardDelete'])->name('comments.delete');
    // Routes cho ReplyComments
    Route::prefix('comments/{comment}')->group(function(){
        Route::resource('replyComments',replyController::class)->except(['create','store','show']);
        Route::post('/replyComments/delete', [replyController::class, 'hardDelete'])->name('replyComments.delete');
    });
});