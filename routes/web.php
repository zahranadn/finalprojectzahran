<?php

use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'App\Http\Contollers\HomeController@homee');

Route::prefix('/')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::get('/', 'HomeController@homee')
            ->name('Home');
    });

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('destinasi-detail', 'DestinasiDetailController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('jadwal-pendakian', 'JadwalPendakianController');
        Route::resource('manage-user', 'ManageUserController');
    });

Route::prefix('management')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth', 'management'])
    ->group(function () {
        Route::get('/', 'DashboardManagementController@index')
            ->name('dashboardmanagement');

        Route::resource('jadwal-pendakian-management', 'JadwalPendakianManagementController');
    });

Route::prefix('ticketbooking')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::get('/', 'TicketbookingController@pesantiket')
            ->name('TicketBooking');
    });

Route::prefix('details/{slug}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::get('/', 'DetailsController@details')
            ->name('Details');
    });

Route::prefix('checkout/{id}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::post('/', 'CheckoutController@process')
            ->name('checkout_process')
            ->middleware(['auth', 'verified']);
    });

Route::prefix('checkout/{id}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::get('/', 'CheckoutController@index')
            ->name('checkout')
            ->middleware(['auth', 'verified']);
    });

Route::prefix('checkout/create/{datapendaki_id}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::post('/', 'CheckoutController@create')
            ->name('checkout-create')
            ->middleware(['auth', 'verified']);
    });

Route::prefix('checkout/remove/{datapendaki_id}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::get('/', 'CheckoutController@remove')
            ->name('checkout-remove')
            ->middleware(['auth', 'verified']);
    });

Route::prefix('checkout/update/{datapendaki_id}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::put('/', 'CheckoutController@update')
            ->name('checkout-update')
            ->middleware(['auth', 'verified']);
    });

Route::prefix('checkout/confirm/{id}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::get('/', 'CheckoutController@success')
            ->name('checkout-success')
            ->middleware(['auth', 'verified']);
    });

Route::prefix('checkout/confirm/{id}')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::get('/', 'CheckoutController@success')
            ->name('checkout-success')
            ->middleware(['auth', 'verified']);
    });

Route::get('/print/{id}', 'App\Http\Controllers\Admin\TransactionController@printData')->name('print');
Route::get('/successnotification/{id}', 'App\Http\Controllers\Admin\TransactionController@successnotification')->name('successnotification');
// Route::get('/print', [TransactionController::class, 'printData'])->name('print');
Route::get('/search', [TransactionController::class, 'search']);
Route::get('/exportdatapendaki', 'App\Http\Controllers\Admin\TransactionController@Datapendakiexport')->name('exportdatapendaki');
Route::post('/importjadwalpendakian', 'App\Http\Controllers\Admin\JadwalPendakianController@jadwalpendakianimport')->name('jadwalpendakianimport');



Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

