<?php

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\MovieCategoriesController;
use App\Http\Controllers\user\MovieDetailController;
use App\Http\Controllers\user\MovieInfoController;
use App\Http\Controllers\user\MoviesByCategoryController;
use App\Http\Controllers\user\MoviesByConditionController;
use App\Http\Controllers\user\SingleMoviesController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\SubscriptionController;
use App\Http\Controllers\user\SeriesMoviesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\user\CommentsController;
use App\Http\Controllers\user\FavoriteMoviesController;
use App\Http\Controllers\user\RepliesController;
use Illuminate\Support\Facades\Route;

// page home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/lienhe', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/gioithieu', [HomeController::class, 'about'])->name('home.about');

Route::get('/SingleMovies', [SingleMoviesController::class, 'index'])->name('SingleMovies.index');
Route::get('/SeriesMovies', [SeriesMoviesController::class, 'index'])->name('SeriesMovies.index');
Route::get('/MovieCategories', [MovieCategoriesController::class, 'index'])->name('MovieCategories.index');

Route::get('/MovieDetail/{id}', [MovieDetailController::class, 'show'])->name('MovieDetail.show');

Route::get('/MovieInfo/{id}', [MovieInfoController::class, 'show'])->name('MovieInfo.show');

Route::get('/profile', [ProfileController::class, 'index']) ->name('profile.index');
Route::post('/profile/{id?}', [ProfileController::class, 'update'])->name('profile.update');



//page child
Route::get('/MoviesByCondition/{condition?}', [MoviesByConditionController::class, 'index'])->name('MoviesByCondition.index');

Route::get('/MoviesByCategory/{idCategory?}', [MoviesByCategoryController::class, 'index'])->name('MoviesByCategory.index');

//favorite Movies
Route::post('/FavoriteMovies/store', [FavoriteMoviesController::class, 'store'])->name('FavoriteMovies.store');
Route::post('/FavoriteMovies/destroy', [FavoriteMoviesController::class, 'destroy'])->name('FavoriteMovies.destroy');
Route::post('/FavoriteMovies/destroyFavoriteInProfile', [FavoriteMoviesController::class, 'destroyFavoriteInProfile'])->name('FavoriteMovies.destroyFavoriteInProfile');

//comments, replies
Route::post('/Comments', [CommentsController::class, 'store'])->name('Comments.store');
Route::post('/Replies', [RepliesController::class, 'store'])->name('Replies.store');


//subsscription
Route::get('/subscriptions/plans', [SubscriptionController::class, 'showPlans'])->name('subscriptions.plans');

// Mua gói đăng ký
Route::post('/subscriptions/{planId}/purchase', [SubscriptionController::class, 'purchasePlan'])->name('subscriptions.purchase');

// Trang thành công sau khi thanh toán
Route::get('/subscriptions/success', [SubscriptionController::class, 'success'])->name('subscriptions.success');
// Route để tạo đơn thanh toán
Route::get('/payment/{subscriptionId}', [PaymentController::class, 'createPayment'])->name('payment.create');

// Route để nhận phản hồi từ VNPAY
Route::get('/payment/response', [PaymentController::class, 'paymentResponse'])->name('payment.response');