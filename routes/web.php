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




Route::group(['prefix' => 'private'], function() {
    Route::auth();
});
//Auth::routes();



//

//honey pot :) Authentication Routes...َ
$this->get('login', 'Auth_honey\LoginController@showLoginForm')->name('honey_login');
$this->post('login', 'Auth_honey\LoginController@login');
$this->post('logout', 'Auth_honey\LoginController@logout')->name('honey_logout');

// Registration Routes...
$this->get('register', 'Auth_honey\RegisterController@showRegistrationForm')->name('honey_register');
$this->post('register', 'Auth_honey\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth_honey\ForgotPasswordController@showLinkRequestForm')->name('honey_password.request');
$this->post('password/email', 'Auth_honey\ForgotPasswordController@sendResetLinkEmail')->name('honey_password.email');
$this->get('password/reset/{token}', 'Auth_honey\ResetPasswordController@showResetForm')->name('honey_password.reset ');
$this->post('password/reset', 'Auth_honey\ResetPasswordController@reset')->name('honey_password.update');





Route::get('/home', 'HomeController@index')->name('home');
