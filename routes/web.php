<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Admin;
use Faker\Guesser\Name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('/top',[TopController::class,'topinput']);
    Route::post('/top',[TopController::class,'topinput1'])->name('topinput1');
    Route::post('/upload',[TopController::class,'input1'])->name('input');
    Route::get('/upload',[TopController::class,'input']);
    Route::get('/update',[TopController::class,'update']);
    Route::post('/update',[TopController::class,'updateRow'])->name('update');
    Route::post('/updates',[TopController::class,'updates'])->name('updates');
    Route::get('/delete',[TopController::class,'delete']);
    Route::post('/delete',[TopController::class,'deleteRow'])->name('delete');
    Route::post('/deletes',[TopController::class,'deletes'])->name('deletes');
    Route::get('/tag',[TopController::class,'tagsShow']);
    Route::post('/tag',[TopController::class,'tags'])->name('tag');
    Route::post('/tags',[TopController::class,'SubTag'])->name('SubTag');
    Route::get('/newsong',[TopController::class,'newsong']);
    Route::post('/newsong',[TopController::class,'newsongs'])->name('newsong');
    Route::get('/logout',[AdminController::class,'logout']);
});
Route::get('/admin/login', [AdminController::class,'showLoginForm'])->name('admin.view_login');
Route::post('/admin/login', [AdminController::class,'login'])->name('admin.login')->middleware('throttle:none');
Route::get('/admin', [AdminController::class,'index'])->name('admin.dashboard')->middleware('auth:admin');
Route::get('/', [TopController::class,'main'])->name('/');
Route::get('/sad',[TopController::class,'sad']);
Route::get('/happy',[TopController::class,'happy']);
Route::get('/download/{music}',[TopController::class,'download']);
Route::get('/search/{search}',[TopController::class,'searchs']);
Route::post('/search',[TopController::class,'search'])->name('search');
Route::get('/top/{id}',[TopController::class,'top']);
Route::get('/{name}',[TopController::class,'artist']);
