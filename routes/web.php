<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
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

Route::get('/',[UserController::class,'index'])->name("index");
Route::get('/register',[UserController::class,'register'])->name('register');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/register',[UserController::class,'create_register']);
Route::post('/login',[UserController::class,'create_login']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('/readmore',[UserController::class,'readmore'])->name('login.page');


Route::middleware(['guard'])->group(function (){
// for admin
        Route::get('/admin',[AdminController::class,'admin_page'])->name("admin");
        Route::get('/post_list',[AdminController::class,'adminpostlist'])->name('admin.post');
        Route::get('/post_confirm/{id}',[AdminController::class,'confirm'])->name('admin.confirm');
        Route::get('/post_cancel/{id}',[AdminController::class,'cancel'])->name('admin.cancel');
        Route::get('/creat-post',[AdminController::class,'admin_creat'])->name('admin.creat');
        Route::post('/create-post',[AdminController::class,'admin_created_post'])->name('admin.create.post');
        Route::get('/admin-post-list',[AdminController::class,'admin_post_list'])->name('admin.post.list');
        Route::get('/admin-post-delete/{id}',[AdminController::class,'admin_post_delete'])->name('admin.post.delete');
        Route::get('/admin-edit-post/{id}',[AdminController::class,'admin_edit_post'])->name('admin.edit.post');
        Route::post('/admin-edit-post/{id}',[AdminController::class,'admin_update_post'])->name('admin.update.post');
        Route::get('/admin-read-more/{id}',[AdminController::class,'admin_read_more'])->name('admin.read');
        

        // for user
        Route::get('/user',[UserController::class,'user_page'])->name("user");
        Route::get('/post',[PostController::class,'post'])->name('post');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit.post');
        Route::post('update/{id}',[UserController::class,'update'])->name('update.post');
        Route::post('/post',[PostController::class,'create_post'])->name('create.post');
        Route::get('/list',[PostController::class,'post_list'])->name('list.post');
        Route::get('/delete/{id}/',[PostController::class,'post_delete'])->name('delete.post');  
        Route::get('/post_view/{id}',[UserController::class,'post_view'])->name('view.post');
        Route::get('/like/{id}',[UserController::class,'like'])->name('like.post');
        Route::post('/comment/{id}',[CommentController::class,'comment_post'])->name('user.comment');
    });