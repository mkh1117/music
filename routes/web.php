<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Admin;
use Database\Seeders\Top;
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
    Route::post('/upload',[TopController::class,'input1'])->name('input');
    Route::get('/upload',[TopController::class,'input']);
    Route::get('/update',[TopController::class,'update']);
    Route::post('/update',[TopController::class,'update'])->name('update');
    Route::post('/updates',[TopController::class,'updates'])->name('updates');
    Route::get('/delete',[TopController::class,'delete']);
    Route::post('/delete',[TopController::class,'deleteRow'])->name('delete');
    Route::post('/deletes',[TopController::class,'deletes'])->name('deletes');
    Route::get('/tag',[TopController::class,'tagsShow']);
    Route::post('/tag',[TopController::class,'tags'])->name('tag');
    Route::post('/tags',[TopController::class,'SubTag'])->name('SubTag');
    Route::get('/tag/update',[TopController::class,'tagUpdate']);
    Route::post('/tag/update',[TopController::class,'tagUpdatepost'])->name('tagupdates');
    Route::get('/tag/delete',[TopController::class,'tagdelete']);
    Route::post('/tag/delete',[TopController::class,'tagdeletepost'])->name('tagdelete');
    Route::get('/searchauto',[TopController::class,'AdminSearchAuto']);
    Route::get('/messageSearchauto',[TopController::class,'messageSearchauto']);
    Route::get('/tag/searchauto',[TopController::class,'tagSearchAuto']);
    Route::get('/socialMedia',[AdminController::class,'socialMedia']);
    Route::post('/socialMedia',[AdminController::class,'socialMediaPost'])->name('socialmedia');
    Route::get('/category',[TopController::class,'category']);
    Route::post('/category',[TopController::class,'categoryPost'])->name('category');
    Route::get('/category/update',[TopController::class,'categoryUpdate']);
    Route::post('/category/update',[TopController::class,'categorysUpdate'])->name('categoryUpdate');
    Route::get('/category/delete',[TopController::class,'categorydelete']);
    Route::post('/category/delete',[TopController::class,'categorysdelete'])->name('categorydelete');
    Route::get('/category/searchauto',[TopController::class,'categorySearchAuto']);
    Route::get('/userweek',[AdminController::class,'user']);
    Route::get('/usermonth',[AdminController::class,'usermonth']);
    Route::get('/topchart',[AdminController::class,'topchart']);
    Route::get('/DashboardSearchauto',[AdminController::class,'DashboardSearchauto']);
    Route::get('/changePassword',[AdminController::class,'changePassword']);
    Route::post('/changePassword',[AdminController::class,'changePasswordpost'])->name('changePassword');
    Route::get('/changeusername',[AdminController::class,'changeusername']);
    Route::post('/changeusername',[AdminController::class,'changeusernamepost'])->name('changeusername');
    Route::get('/add/admin',[AdminController::class,'addAdmin']);
    Route::post('/add/admin',[AdminController::class,'addAdminPost'])->name('addAdmin');
    Route::get('/update/admin',[AdminController::class,'updateAdmin']);
    Route::get('/update/adminUpdate',[AdminController::class,'AdminUpdate']);
    Route::post('/update/adminUpdate',[AdminController::class,'AdminsUpdate'])->name('AdminUpdate');
    Route::get('/message',[AdminController::class,'message']);
    Route::get('/answer',[AdminController::class,'answer']);
    Route::post('/answer',[AdminController::class,'answeremail'])->name('email');
    Route::get('/delete/admindelete',[AdminController::class,'Admindelete']);
    Route::post('/delete/admindelete',[AdminController::class,'Adminsdelete'])->name('Admindelete');
    Route::get('/logout',[AdminController::class,'logout']);
});
Route::get('/admin/login', [AdminController::class,'showLoginForm'])->name('admin.view_login');
Route::post('/admin/login', [AdminController::class,'login'])->name('admin.login')->middleware('throttle:none');
Route::get('/admin', [AdminController::class,'dashboard'])->name('admin.dashboard')->middleware('auth:admin');
Route::get('/captcha',[TopController::class,'captcha'])->name('captcha');
Route::get('/', [TopController::class,'main'])->name('/');
Route::get('/about-us',[TopController::class,'about_us']);
Route::get('/call-us',[TopController::class,'call_us']);
Route::post('/call-us',[TopController::class,'sendMessage'])->name('sendMessage');
Route::get('/category/{category}',[TopController::class,'categoryShow']);
Route::get('/search/{search}',[TopController::class,'searchs']);
Route::get('/searchauto',[TopController::class,'searchauto']);
Route::get('/search',[TopController::class,'search'])->name('search');
Route::get('/top/{id}',[TopController::class,'top']);
Route::get('/{name}',[TopController::class,'artist']);
