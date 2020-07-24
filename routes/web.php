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

Route::get('/blogcontent/{blogId}', function () {
    return view('blogcontent');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/profile', function () {
    return view('myprofile');
});
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



