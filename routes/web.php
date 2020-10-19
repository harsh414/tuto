<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
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
    return view('homee');
});


/* SOCIALITE login  */
Route::get('login/{service}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{service}/callback', [LoginController::class, 'handleProviderCallback']);
Auth::routes();
//***********************************************

Route::get('/payments/create','PaymentController@create')->middleware('auth');
Route::post('/payments','PaymentController@store')->name('pay');


//notifications routes
Route::get('notifications','UserNotificationController@index');
Route::post('markasread','UserNotificationController@read');
//notificarion routes ends

//live search route
Route::get('action','LiveSearchController@action')
    ->name('live_search.action');


Route::get('/dashboard', 'DashboardController@index');
Route::get('/homee',function (){
    return view('homee');
});
Route::resource('posts','PostsController');
Route::get('ajax/create','TestsController@create');
Route::post('ajax/create','TestsController@store');


