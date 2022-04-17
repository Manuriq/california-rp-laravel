<?php

use App\Http\Controllers\ValidateIp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;

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
    return view('home');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function() {
    
    Route::view('/', 'panel.index')->name('dashboard');
    Route::view('/settings', 'settings')->name('settings');
    Route::get('/validateip', [ValidateIp::class, 'index'])->name('ip');

    Route::resource("/forum", ForumController::class);

    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function() {
        Route::view('/', 'admin')->name('admin');
        Route::group(['middleware' => 'owner'], function() {
            
        });
    });

});

require __DIR__.'/auth.php';


