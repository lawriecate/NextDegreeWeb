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
Route::post('/contact-form','SplashController@sendContactForm');
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
Route::post('/signup/start','QuickSignupController@redirect');
Route::post('/signup/facebook','QuickSignupController@redirectToFacebook');
Route::get('/signup/error','QuickSignupController@error');

Route::get('/signup/verification/{token?}','VerificationController@status');
Route::post('/signup/verification/','VerificationController@request_resend');

Route::get('/home', 'HomeController@index');
Route::get('/student', 'StudentHomeController@index');
Route::get('/business', 'BusinessHomeController@index');
Route::post('/profile/save-profile', 'ProfileController@saveProfile');
Route::post('/profile/save-profile-ajax', 'ProfileController@saveProfileAjax');
Route::post('/profile/send-photo','ProfileController@updateProfilePhoto');
Route::post('/profile/send-cv','ProfileController@updateStudentCv');

Route::get('/settings', 'SettingsController@accountForm');
Route::post('/settings', 'SettingsController@update');
Route::get('/settings/{network}/copyphoto', 'SettingsController@promptCopyProfile');
Route::post('/settings/{network}/copyphoto', 'SettingsController@copyProfile');
Route::get('/settings/facebook/callback', 'SettingsController@facebookCallback');
Route::get('/settings/facebook/connect', 'SettingsController@redirectToFacebook');
Route::get('/settings/linkedin/callback', 'SettingsController@linkedInCallback');
Route::get('/settings/linkedin/connect', 'SettingsController@redirectToLinkedIn');




/*
Route::get('/admin/files', 'AdminController@files');
Route::post('/admin/files/upload', 'AdminController@uploadFile');
Route::delete('/admin/files/{file}', 'AdminController@deleteFile');*/
Route::get('/admin/cron','CronController@run');
Route::group(['prefix' => 'admin','middleware' => ['auth.admin']], function () {
	Route::get('/', 'AdminController@index');
    Route::resource('file', 'FileController', ['only' => [
	    'index', 'store', 'destroy'
	]]);

	Route::resource('post', 'PostController', ['only' => [
	    'index', 'store', 'destroy', 'create', 'edit','update'
	]]);

	Route::post('post/check-slug','PostController@checkSlug');

	Route::resource('user', 'UserController', ['only' => [
	    'index', 'store', 'destroy', 'create', 'edit','update'
	]]);

	Route::resource('institution', 'InstitutionController', ['only' => [
	    'index', 'store', 'destroy', 'create', 'edit','update'
	]]);

	Route::resource('job', 'JobController', ['only' => [
	    'index'
	]]);

	Route::resource('case', 'SupportController', ['only' => [
	    'index','edit'
	]]);

	Route::resource('job-type', 'JobTypeController', ['only' => [
	    'store','create'
	]]);



	Route::get('/api/images', 'FileController@imageJson');
	Route::post('/api/institution', 'InstitutionController@autocompleteJson');
	Route::get('/api/editor/{post}', 'PostController@getJson');
	Route::post('/api/profile/resetStudentProfile', 'ProfileController@resetStudentProfile');
	Route::post('/api/profile/resetBusinessProfile', 'ProfileController@resetBusinessProfile');
});


Route::get('/articles/feed.xml', 'PostController@feed');
Route::get('/articles/{post}', 'PostController@show');


Route::get('{page}', function($page) {
	if(file_exists(base_path('resources/views/pages/'.$page.'.blade.php'))) {
		return view('pages.'.$page);
	} else {
		abort(404);
	}
});

