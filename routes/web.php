<?php

use App\Http\Controllers\ValidateIp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CategorieController;

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


    Route::group(['prefix' => 'forum'], function() {

        Route::controller(PostController::class)->group(function () {
            Route::get('/{forum}/create', 'create')->name('p.create');
            Route::post('/{forum}/store', 'store')->name('p.store');
            Route::get('/{forum}/{post}', 'show')->name('p.show');
        });

        Route::get('/', [CategorieController::class, 'index'])->name('forum.index');
        
        Route::get('/{forum}', [ForumController::class, 'show'])->name('f.show');

        /*
        Route::get('/{forum}/{post}', [PostController::class, 'show'])->name('p.show');
        Route::get('/{forum}/create', [PostController::class, 'create'])->name('p.create');
        Route::post('/{forum}/store', [PostController::class, 'store'])->name('p.store');*/
        //Route::resource("/f", ForumController::class);
        //Route::resource("/p", PostController::class);
    });
    
    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function() {
        Route::view('/', 'admin')->name('admin');
        Route::group(['middleware' => 'owner'], function() {
            
        });
    });

});

require __DIR__.'/auth.php';


