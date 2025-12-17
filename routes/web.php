<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Http;
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

Route::resource('/',PostController::class);
// Route::post('post/update/{id}',[PostController::class,'update'])->name('post/update');
Route::post('trncat',[PostController::class,'trncat'])->name('trncat');
Route::get('restore/{id}',[PostController::class,'restore'])->name('restore');
Route::get('forceDelete/{id}',[PostController::class,'forceDelete'])->name('forceDelete');
Route::post('post/show', [PostController::class,'show'])->name('post/show');
Route::resource('post',PostController::class);

#test query scope
Route::get('test_query_scope',[PostController::class,'test_query_scope'])->name('test_query_scope');

