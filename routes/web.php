<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/{slug}', 'HomeController@single')->name('product.single');
Route::get('/category/{slug}', 'CategoryController@index')->name('category.single');
Route::get('/store/{slug}', 'StoreController@index')->name('store.single');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
    Route::get('/thanks', 'CheckoutController@thanks')->name('thanks');
    Route::post('/notification', 'CheckoutController@notification')->name('notification');
});

Route::get('my-orders', 'UserOrderController@index')->name('user.orders')->middleware('access.control.store.admin');

Route::group(['middleware' => ['auth', 'access.control.store.admin']], function () {

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductsController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');

        Route::get('orders/my', 'OrdersController@index')->name('orders.my');
        Route::get('notifications', 'NotificationController@notifications')->name('notification.index');
        Route::get('notifications/read-all', 'NotificationController@readAll')->name('notfications.read.all');
        Route::get('notifications/read/{notification}', 'NotificationController@read')->name('notfications.read');
    });
});

// Route::get('not', function() {
//     $user = \App\User::find(41);
//     $user->notify(new \App\Notifications\StoreReceiveNewOrder());

//     return $user->notifications;
// });

Auth::routes();
