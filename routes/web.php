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
})->name('home');

Route::get('model', function () {
    // $products = \App\Product::all();

    // $user = new \App\User();
    // $user->name = 'teste';
    // $user->email = 'email@teste.com';
    // $user->password = bcrypt('123456');
    // $user->save();
    // return \App\User::all();
    // $user = \App\User::find(4);
    // return $user->store;
    // return \App\User::all();
    // return $products;

    // $loja = \App\Store::find(1);
    // return $loja->products()->where('id', 1)->get();
    // return $loja->products;

    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja teste',
    //     'description' => 'Loja teste de produtos de informatica',
    //     'mobile_phone' => '99999999',
    //     'phone' => '99999999',
    //     'slug' => 'loja-teste'
    // ]);

    //     $store = \App\Store::find(41);
    //    $product = $store->products()->create([
    //         'name' =>'Notebook dell',
    //         'description' => 'core i5',
    //         'body' => 'qualquer coisa',
    //         'price' => 3000.00,
    //         'slug'  => 'norebook-dell',
    //     ]);
    // dd($product);
    // return \App\User::all();


    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games'
    // ]);

    // \App\Category::create([
    //     'name' => 'Notebook',
    //     'description' => null,
    //     'slug' => 'notebook'
    // ]);

    // $category = \App\Category::find();
    // $category->

    // $product = \App\Product::find(41);

    // return $product->categories;
});

Route::group(['middleware' => 'auth'], function() {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('create', 'StoreController@create')->name('create');
        //     Route::post('store', 'StoreController@store')->name('store');
        //     Route::get('{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('update/{store}', 'StoreController@update')->name('update');
        //     Route::get('destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });
        
            Route::resource('stores', 'StoreController');
            Route::resource('products', 'ProductsController');
        });
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
