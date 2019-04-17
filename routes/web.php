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

Route::get('/admin/kunden/pdf/{id}', 'DynamicPDFController@pdf');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/kunden', 'KundenController');
Route::post('/search', 'KundenController@search')->name('search');;
Route::get('/admin/generate_offer/{id}', 'KundenController@printoffer');
Route::get('/admin/download_pdf/{id}', 'KundenController@download_pdf');
Route::post('/admin/kunden/{id}/save_repayment', 'KundenController@saveRepayment');
Route::get('/admin/kunden/{id}/delete_repayment', 'KundenController@deleteRepayment');
Route::get('/admin/kunden/{id}/delete_timeline', 'KundenController@deleteTimeline');
Route::post('/admin/kunden/{id}/save_timeline', 'KundenController@saveTimeline');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dynamic_pdf', 'DynamicPDFController@index');
Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
Route::get('/headmin', 'HomeController@headmin')->name('headmin')->middleware('status');
Route::resource('headmin/group', 'GroupController')->middleware('status');
Route::get('/showgroup/{id}', 'GroupController@show');
Route::resource('headmin/user', 'UserController')->middleware('status');
Route::get('headmin/myprofile', [
    'as' => 'headmin.myprofile',
    'middleware' => 'auth',
    function() {
        return view('headmin.viewprofile');
    }
]);
Route::post('/update_profile', 'ProfileController@update')->name('update_profile');
Route::get('/deletegroup/{id}', 'GroupController@destroy');
Route::post('/creategroup', 'GroupController@store')->name('creategroup');
Route::get('/deleteuser/{id}', 'UserController@destroy');
Route::get('/edituser/{id}', 'UserController@edit');
Route::get('/setgroupleader', 'GroupController@update');

        //
        //
        // //$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        // $this->post('login', 'Auth\LoginController@login');
        // $this->post('logout', 'Auth\LoginController@logout')->name('logout');
        //
        // // Registration Routes...
        // $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        // $this->post('register', 'Auth\RegisterController@register');
        //
        // // Password Reset Routes...
        // $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        // $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        // $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
