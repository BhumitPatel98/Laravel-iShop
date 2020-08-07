<?php


use Illuminate\Support\Facades\Route;

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

Route::get('/',[

    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('product/{id}',[

    'uses' => 'FrontEndController@singleProduct',
    'as' => 'products.single'
]);

Route::post('/cart/add',[

    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/cart',[

    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::get('/cart/delete/{id}',[

    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.dalete'

]);

Route::get('/cart/incr/{id}/{quantity}',[

    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'

]);

Route::get('/cart/decr/{id}/{quantity}',[

    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'

]);

Route::get('/cart/rapid/add/{id}',[

    'uses'=> 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart/checkout',[

        'uses' => 'CheckoutController@index',
        'as' => 'cart.checkout'
]);

Auth::routes();

Route::resource('products', 'ProductsController');

Route::get('/home', 'HomeController@index')->name('home');
