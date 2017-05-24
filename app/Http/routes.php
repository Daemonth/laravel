<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Entity\Member;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', 'View\MemberController@toLogin');
Route::get('/register', 'View\MemberController@toRegister');

Route::get('/category', 'View\BookController@toCategory');
Route::get('/product/category_id/{category_id}', 'View\BookController@toProduct');
Route::get('/product/{product_id}', 'View\BookController@toPdtContent');

Route::get('/cart', 'View\CartController@toCart');

Route::group(['prefix' => 'service'], function () {
  Route::get('validate_code/create', 'Service\ValidateController@create');
  Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
  Route::post('upload/{type}', 'Service\UploadController@uploadFile');

  Route::post('register', 'Service\MemberController@register');
  Route::post('login', 'Service\MemberController@login');

  Route::get('category/parent_id/{parent_id}', 'Service\BookController@getCategoryByParentId');
  Route::get('cart/add/{product_id}', 'Service\CartController@addCart');
  Route::get('cart/delete', 'Service\CartController@deleteCart');

  Route::post('alipay', 'Service\PayController@aliPay');
  Route::post('wxpay', 'Service\PayController@wxPay');

  Route::post('pay/ali_notify', 'Service\PayController@aliNotify');
  Route::get('pay/ali_result', 'Service\PayController@aliResult');
  Route::get('pay/ali_merchant', 'Service\PayController@aliMerchant');

  Route::post('pay/wx_notify', 'Service\PayController@wxNotify');
});
Route::group(['prefix' => 'service'], function () {
  Route::get('validate_code/create', 'Service\ValidateController@create');
  Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
  Route::post('upload/{type}', 'Service\UploadController@uploadFile');

  Route::post('register', 'Service\MemberController@register');
  Route::post('login', 'Service\MemberController@login');

  Route::get('category/parent_id/{parent_id}', 'Service\BookController@getCategoryByParentId');
  Route::get('cart/add/{product_id}', 'Service\CartController@addCart');
  Route::get('cart/delete', 'Service\CartController@deleteCart');

  Route::post('alipay', 'Service\PayController@aliPay');
  Route::post('wxpay', 'Service\PayController@wxPay');

  Route::post('pay/ali_notify', 'Service\PayController@aliNotify');
  Route::get('pay/ali_result', 'Service\PayController@aliResult');
  Route::get('pay/ali_merchant', 'Service\PayController@aliMerchant');

  Route::post('pay/wx_notify', 'Service\PayController@wxNotify');
});