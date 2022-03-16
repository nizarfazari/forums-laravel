<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Facade\FlareClient\View;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () 
{
    $nama = "nizar fazari";
    return view('home', [
        'nama' => $nama,
        'active' => 'home',
        "prodi" => "Sistem Informasi",
        "title" => "Home"
]);
});

Route::get('/about', function() {
    return view('about', [
        "nama" => "Muhammad Nizar Fazari",
        'active' => 'about',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);


//mengunakan model binding
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'categories' => Category::all(),
        'active' => 'categories',
        'title' => 'Post Categories'
    ]);
    
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blog', [
        "title" => "Category : $category->name",
        //karena menggunakan route model binding jadi eagernya harus menerima parent dulu
            "post" => $category->posts,
        //"post" => $category->posts->load('category', 'author'),
        'active' => 'categories',
    ]);
}) ;

Route::get('/authors/{author:username}', function(User $author){
    return view('blog', [
        "title" => "Author : $author->name",
        "post" => $author->posts,
        //karena menggunakan route model binding jadi eagernya harus menerima parent dulu
        //"post" => $author->posts->load('category', 'author'),
        'active' => 'Posts',
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout' ,[LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index');
    })->middleware('auth');



Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');