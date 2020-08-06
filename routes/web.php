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
Route::post('/log', 'Auth\LoginController@authenticate')->name('log');
Route::get('/howitworks', function () {
    return view('howitworks');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/sample', function () {
    return view('sample');
});
Route::get('/terms', function () {
    return view('terms');
});

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/privacy_policy', function () {
    return view('privacy_policy');
});
Route::get('/mydashboard', function () {
    return view('Dashboard');
});
Route::get('/refaral', function () {
    return view('refaral');
});
Route::get('/myProfile', function () {
    return view('profile');
});
Route::get('/revision', function () {
    return view('revision');
});
Route::get('/unpaid', function () {
    return view('UnPaid');
});
Route::get('/payment', function () {
    return view('payment');
});
Route::get('/onprogress', function () {
    return view('onprogress');
});
Route::get('/disputed', function () {
    return view('disputed');
});
Route::get('/completed', function () {
    return view('Completed');
});
Route::get('/blogcontent/{blogId}', function () {
    return view('blogcontent');
});
Route::get('/samplecontent/{sampleId}', function () {
    return view('sampleContent');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/profile', function () {
    return view('myprofile');
});
Route::get('/myprofile','HomeController@unpaid');
// Route::get('/task', function () {
//     return view('order');
// });

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/markasread', function (){
    auth()->user()->unreadNotifications->markAsRead();
});
Route::get('/task', 'HomeController@task')->name('task');
Route::get('/myorder', 'HomeController@myorder')->name('myorder');
Route::get('/myorderdetails/{id}', 'HomeController@myorderdetails');
Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d\-/_.]+)?' );

Route::get('/','HomeController@countries')->name('countries');

