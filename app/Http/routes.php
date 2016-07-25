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

Route::get('/', 'SplashController@splash');

// Authentication Routes...
//Route::get('login', 'Auth\AuthController@showLoginForm');
Route::get('signin', 'Auth\AuthController@showLoginForm');
Route::post('signin', 'Auth\AuthController@login');
Route::get('signout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::post('/signup/welcome','QuickSignupController@makeUser');
Route::post('/signup/start','QuickSignupController@continue');
Route::get('/signup/error','QuickSignupController@error');

Route::get('/signup/verification/{token?}','VerificationController@status');
Route::post('/signup/verification/','VerificationController@request_resend');

Route::get('/home', 'HomeController@index');

Route::get('/settings', 'SettingsController@accountForm');
Route::post('/settings', 'SettingsController@update');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/files', 'AdminController@files');
Route::post('/admin/files/upload', 'AdminController@uploadFile');

Route::get('/{post}', function(App\Post $post) {
	return view('post')->with('post',$post);
});

Route::get('/{page}', function($page) {
	if(file_exists('../resources/views/pages/'.$page.'.blade.php')) {
		return view('pages.'.$page);
	} else {
		abort(404);
	}
});
