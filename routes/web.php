<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    
    $posts = Post::orderBy('created_at', 'desc')->get();
    
    return view('index', compact('posts'));
})->name('index');

Route::get('shop', function () {
    return view('shop');
})->name('shop');



Auth::routes(['verify' => true]);

Route::post('/store/{comment}', [App\Http\Controllers\CommentsController::class, 'store'])->name('store')->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



Route::get('/edit/{id}', [App\Http\Controllers\CommentsController::class, 'edit'])->name('edit')->middleware('verified'); 

Route::put('/update/{id}', [App\Http\Controllers\CommentsController::class, 'update'])->name('update')->middleware('verified'); 

Route::get('/delete/{id}', [App\Http\Controllers\CommentsController::class, 'destroy'])->name('delete')->middleware('verified');

Route::get('/updateuserform/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('updateuserform')->middleware('verified');

Route::put('/updateuser/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateuser')->middleware('verified');

Route::get('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteuser')->middleware('verified');

Route::get('/usermanagement', [App\Http\Controllers\UserController::class, 'index'])->name('manageusers')->middleware('checkAdmin');

Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('showuser');

//posts
Route::get('/addpost', [App\Http\Controllers\PostsController::class, 'create'])->name('addpost')->middleware('checkAdmin');

Route::put('/poststored', [App\Http\Controllers\PostsController::class, 'store'])->name('poststored')->middleware('checkAdmin');

Route::get('post/{post_id}', [App\Http\Controllers\PostsController::class, 'show'])->name('showpost');

Route::get('/manageposts', [App\Http\Controllers\PostsController::class, 'managePosts'])->name('managePosts')->middleware('checkAdmin');

Route::get('/editpost/{post_id}', [App\Http\Controllers\PostsController::class, 'edit'])->name('editpost')->middleware('checkAdmin');

Route::put('/updatepost/{post_id}', [App\Http\Controllers\PostsController::class, 'update'])->name('updatepost')->middleware('checkAdmin');

Route::get('/deletepost/{post_id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('deletepost')->middleware('checkAdmin');

Route::get('/authorposts/{id}', function ($id) {
    $posts= Post::where('author_id', '=', $id)->get();
    return view('authorPostsList', compact('posts'));
})->name('authorpostlist');