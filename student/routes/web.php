<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


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
    Alert::success('Success Title', 'Success Message');
    return view('welcome');
   
});
Route::resource('employee','StudentController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/approve/{id}', 'ApprovalsController@approve')->name('employee.approve');
Route::get('/decline/{id}', 'ApprovalsController@decline')->name('employee.decline');

Route::get('/ceo_mail/{id}', 'StudentController@ceo_mail');
Route::get('/hr_mail/{id}', 'StudentController@hr_mail');