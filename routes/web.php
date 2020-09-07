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

Route::get('/', function () {
    return view('welcome');
});

Route::get('model', function() {
    $products = \App\Product::all();

    $user = new \App\User();
    $user->name = 'teste';
    $user->email = 'email@teste.com';
    $user->password = bcrypt('123456');
    // $user->save();
    return \App\User::all();

    return $products;
});
