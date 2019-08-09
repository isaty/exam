<?php
use App\Http\Controllers\AdminController;

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
    return view('website.welcome');
});

Auth::routes();


Route::get('/home', 'HomeControllers@index')->name('home');

Route::get('/admin/home', 'AdminController@index')->name('admin.home');
Route::get('/admin/login','Admin\LoginController@showLoginForm')->name('admin.log');      
Route::POST('/admin/login','Admin\LoginController@login')->name('admin.login');                  
Route::POST( '/admin/logout','Admin\LoginController@logout');                       
Route::POST('/admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email'); 
Route::GET('/admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm ')->name('admin.password.request');
Route::POST('/admin-password/reset','Admin\ResetPasswordController@reset');               
Route::GET('/admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');       
Route::GET('/admin/register','Admin\RegisterController@showRegistrationForm');
Route::POST('/admin/register','Admin\RegisterController@register')->name('admin.register');  

Route::POST('admin/schedule','ExamController@schedule');
Route::POST('admin/addQuestion','QuestionController@addQuestion');
Route::POST('admin/exams','ExamController@showExam');
Route::POST('admin/terminate','ExamController@terminate');
Route::get('admin/users','AdminController@showUser');
Route::POST('admin/edit','QuestionController@edit');
Route::POST('admin/showadmin','QuestionController@showadmin');
Route::POST('admin/compile','ResultController@compile');

ROUTE::get('admin/start','AutoController@autostart');
ROUTE::get('admin/end','AutoController@autoend');
ROUTE::get('/start','AutoController@autostart');
ROUTE::get('/end','AutoController@autoend');

Route::POST('/search','ResponseController@search');
Route::POST('show','ResponseController@show');
Route::POST('keep','ResponseController@keep');
Route::POST('duration','ResponseController@timer');
Route::POST('save','ResponseController@save');
Route::POST('check','ResponseController@check');
Route::POST('timeout','ResponseController@timeout');
Route::get('thankyou',function(){
    return view('thankyou');
});
Route::GET('/sync','AdminController@sync');