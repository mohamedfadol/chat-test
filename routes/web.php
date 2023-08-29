<?php

use App\Events\WebsocketEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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
    // \Artisan::call('config:cache');
    // \Artisan::call('cache:clear');
    // \Artisan::call('route:clear');
    // \Artisan::call('config:clear');

    // if (broadcast(new WebsocketEvent('hello from route'))) {
    //     return 'ok';
    // }
    // broadcast(new WebsocketEvent('hello from route'));
    return view('welcome');
});

Route::get('chat', [App\Http\Controllers\ChatController::class,'index']);
Route::get('getMessages', [App\Http\Controllers\ChatController::class,'getMessages']);
Route::post('postMessages', [App\Http\Controllers\ChatController::class,'postMessages']);
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
