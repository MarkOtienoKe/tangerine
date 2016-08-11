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
Route::group(['middleware'=>['web']], function(){
	Route::get('/', function () {
return view('login');

})->name('home');

Route::post('/signup', [
	'uses'=>'UserController@postRegister',
	'as'=>'signup'
	]);

Route::post('/signin', [
	'uses'=>'UserController@postLogin',
	'as'=>'signin'
	]);

Route::get('/logout', [
	'uses' => 'UserController@getLogout',
	'as' => 'logout'
	]);

Route::get('/userprofile',[
'uses'=> 'UserController@getUserProfile',
'as'=> 'userprofile',
'middleware'=>'auth'
]);

Route::get('/dashboard', [
	'uses' => 'SiteController@getDashboard',
	'as' =>'dashboard',
	'middleware' => 'auth'
]);

Route::get('/delete/{site_id}', [
	'uses' => 'SiteController@getDeleteSite',
	'as' => 'delete',
	'middleware' => 'auth'
	]);

Route::post('/editsites', [
'uses'=> 'SiteController@postEditSite',
'as'=> 'editsites'
]);
Route::post('/editsite', [
'uses'=> 'SiteController@siteEditSite',
'as'=> 'edit.site'
]);

Route::post('/addsite', [
	'uses'=>'SiteController@postAddSite',
	'as'=>'addsite',
	'middleware' => 'auth'
	]);

Route::get('login', function()
{
return view('login');
});

Route::get('register', function()
{
return view('register');
});

Route::get('/index', [
	'uses' => 'SiteController@getIndex',
	'as' =>'index',
	'middleware' => 'auth'
]);

Route::post('/updateaccount', [
	'uses' => 'UserController@postSaveAccount',
	'as' =>'account.save'
]);

Route::get('/profileimage/{filename}', [
	'uses' => 'UserController@getProfileImage',
	'as' =>'profile.image',
	'middleware' => 'auth'
]);

Route::get('/viewsites', [
	'uses' => 'SiteController@getViewSites',
	'as' =>'viewsites',
	'middleware' => 'auth'
]);

Route::get('/addclient', [
	'uses' => 'ClientController@getClient',
	'as' =>'addclient',
	'middleware' => 'auth'
]);

Route::post('/addclient', [
	'uses' => 'ClientController@postAddClient',
	'as' =>'addclient',
	'middleware' => 'auth'
]);
Route::post('/edit.client', [
'uses'=> 'ClientController@postEditClient',
'as'=> 'edit.client'
]);

Route::post('/transaction', [
	'uses' => 'TransactionController@postTransaction',
	'as' =>'transaction',
	'middleware' => 'auth'
]);

Route::get('/transaction', [
	'uses' => 'TransactionController@getTransaction',
	'as' =>'transaction',
	'middleware' => 'auth'
]);

Route::get('/obtain', [
'uses' => 'SiteController@getMap',
	'as' =>'obtain'
]);

/*Route::get('addclient', function()
{
return view('addclient');
});*/
});