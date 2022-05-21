<?php

use App\Http\Controllers\ValidateIp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscordController;

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
})->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function() {
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/discord', [DiscordController::class, 'redirectToProvider'])->name('discord');
    Route::get('/discord/redirect', [DiscordController::class, 'handleProviderCallback']);

    // Les routes Profile
    Route::group(['prefix' => 'profile'], function() {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/validateip', 'validateip')->name('profile.ip');
            Route::post('/avatar', 'update')->name('profile.update');
            Route::get('/{compte}', 'show')->name('profile.show');
        });
    });

    // Les routes forum
    Route::group(['prefix' => 'forum'], function() {

        Route::get('/', [CategorieController::class, 'index'])->name('categorie.index');

        Route::controller(ForumController::class)->group(function () {
            Route::get('/{forum}', 'show')->name('f.show');
        });

        Route::group(['prefix' => 'post'], function() {
            Route::controller(PostController::class)->group(function () {
                Route::get('/{post}', 'show')->name('p.show');
                Route::get('/create/{forum}', 'create')->name('p.create');
                Route::post('/store/{forum}', 'store')->name('p.store');
                Route::get('/edit/{post}', 'edit')->name('post.edit');
                Route::patch('/update/{post}', 'update')->name('post.update');
                Route::get('/delete/{post}', 'destroy')->name('post.destroy');
            });
        });

        Route::group(['prefix' => 'message'], function() {
            Route::controller(MessageController::class)->group(function () {
                Route::post('store/{post}', 'store')->name('m.store');
                Route::get('edit/{message}', 'edit')->name('message.edit');
                Route::get('delete/{message}', 'destroy')->name('message.destroy');
                Route::patch('update/{message}', 'update')->name('message.update');
            });
        });

        /*
        Route::get('/{forum}/{post}', [PostController::class, 'show'])->name('p.show');
        Route::get('/{forum}/create', [PostController::class, 'create'])->name('p.create');
        Route::post('/{forum}/store', [PostController::class, 'store'])->name('p.store');*/
        //Route::resource("/f", ForumController::class);
        //Route::resource("/p", PostController::class);
    });
    
    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function() {
        Route::view('/', 'admin')->name('admin');


        Route::group(['prefix' => 'forum'], function() {      
            Route::controller(ForumController::class)->group(function () {
                Route::get('/', 'index')->name('forum.index');
                Route::get('/delete/{forum}', 'destroy')->name('forum.delete');
                Route::get('/edit/{forum}', 'edit')->name('forum.edit');
                Route::post('/update/{forum}', 'update')->name('forum.update');
                Route::get('/create', 'create')->name('forum.create');
                Route::post('/store', 'store')->name('forum.store');
            });
        });

        Route::group(['prefix' => 'categorie'], function() {      
            Route::controller(CategorieController::class)->group(function () {
                Route::get('/', 'list')->name('categorie.list');
                Route::get('/delete/{categorie}', 'destroy')->name('categorie.delete');
                Route::get('/edit/{categorie}', 'edit')->name('categorie.edit');
                Route::post('/update/{categorie}', 'update')->name('categorie.update');
                Route::get('/create', 'create')->name('categorie.create');
                Route::post('/store', 'store')->name('categorie.store');
            });
        });
    });

    Route::group(['middleware' => ['modo'], 'prefix' => 'mod'], function() {
        Route::controller(CompteController::class)->group(function () {
            Route::get('/', 'list')->name('compte.list');
            Route::post('/', 'search')->name('compte.search');
            Route::get('/edit/{compte}', 'edit')->name('compte.edit');
            Route::post('/update/{compte}', 'update')->name('compte.update');
        });
    });

});

require __DIR__.'/auth.php';


