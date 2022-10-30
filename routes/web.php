<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::resource('/blog', BlogController::class)->except('create', 'store', 'edit', 'update', 'destroy');
Route::get('/category/{category:slug}', function (Category $category) {
    return view('blog.index', [
        'title' => "Category : $category->name",
        'blogs' => $category->blog
    ]);
});
Route::get('/author/{author:username}', function (User $author) {
    return view('blog.index', [
        'title' => "Author : $author->name",
        'blogs' => $author->blog
    ]);
});
Route::get('/category', function (Category $category) {
    return view('page.category', [
        'categories' => $category::all()
    ]);
});
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard/wellcome');
})->middleware('auth');
Route::get('/dashboard/blog/checkSlug', [DashboardBlogController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/blog', DashboardBlogController::class)->middleware('auth');
Route::resource('/dashboard/category', AdminCategoryController::class)->except('show')->middleware('admin');
