<?php

use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', [HomeController::class, 'index']);
Route::get('/', function () {
    return view('index');
});

Route::get('/sejarah', function (){
    return view('profil/view_sejarah');
});

Route::get('/lambanglogo', function (){
    return view('profil/view_lambang');
});

Route::get('/gambaranumum', function (){
    return view('profil/view_gambaran');
});

Route::get('/struktur', function (){
    return view('profil/struktur');
});

Route::get('/tugaspokok', function (){
    return view('profil/tugaspokok');
});

Route::get('/angkutan', function (){
    return view('profil/angkutan');
});

Route::get('/hymne', function (){
    return view('profil/view_hymne');
});

Route::get('/perizinan', function (){
    return view('view_perizinan');
});

Route::get('/ifberkala', function (){
    return view('informasi/view_berkala');
});

Route::get('/ifsetiap', function (){
    return view('informasi/view_setiapsaat');
});

Route::get('/ifsertamerta', function (){
    return view('informasi/view_sertamerta');
});

Route::get('/login',[LoginController::class,'main_dashboard'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/enter',[HomeController::class,'dashboard'])->name('dashboard');

    Route::get('/user',[HomeController::class,'main_dashboard'])->name('main_dashboard');
    Route::get('/create',[HomeController::class,'create'])->name('user.create');
    Route::post('/store',[HomeController::class,'store'])->name('user.store');

    Route::get('/clientside',[DataTableController::class,'clientside'])->name('clientside');

    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');

    Route::get('/postingan',[PostController::class,'postingan'])->name('postingan');
    Route::get('/postingan/create-post',[PostController::class,'create_post'])->name('create-post');
    Route::post('/postingan/store-post',[PostController::class,'store_post'])->name('store-post');
    Route::get('/postingan/detail-post/{id}',[PostController::class,'detail_post'])->name('detail-post');
    Route::get('/postingan/edit-post/{id}',[PostController::class,'edit_post'])->name('edit-post');
    Route::put('/postingan/update-post/{id}',[PostController::class,'update_post'])->name('update-post');
    Route::get('/postingan/delete-post/{id}',[PostController::class,'delete_post'])->name('delete-post');


});

