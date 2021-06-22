<?php

use App\Http\Controllers\MemeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/', fn () => view('index'));

Route::post('/', [MemeController::class, 'create']);

Route::get('/memes', [MemeController::class, 'show']);

Route::get('/success', [MemeController::class, 'show']);


