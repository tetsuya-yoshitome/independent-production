<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sample', [App\Http\Controllers\SampleController::class, 'find']);
Route::post('/sample', [App\Http\Controllers\SampleController::class, 'serch']);

Route::get('/sample/{sell_day}', [App\Http\Controllers\SampleController::class, 'sell'])->name('sell');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/edit/{item_e}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
    Route::post('/edit/{item_e}', [App\Http\Controllers\ItemController::class, 'update']);
});
