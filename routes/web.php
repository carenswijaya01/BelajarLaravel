<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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

/** ROUTES v2 */

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/category/{category:slug}', [PostController::class, 'showByCategory']);
Route::get('/author/{user:username}', [PostController::class, 'showByAuthor']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'name' => "Carens",
        'email' => 'carenskurniawanwijaya@gmail.com',
        'image' => 'contoh-img.jpeg'
    ]);
});

/** ================== ROUTES v1 ================== */

// Route::get('/', function () {
//     return view('home', ['title' => 'Home']);
// });

// Route::get('/blog', function () {
//     return view('blog', ['title' => 'Blog', 'posts' => Post::all()]);
// });

// Route::get('/post/{slug}', function ($slug) {
//     return view('post', ["title" => "Single Post", "post" => Post::find($slug)]);
// });

// Route::get('/about', function () {
//     return view('about', [
//         'title' => 'About',
//         'name' => "Carens",
//         'email' => 'carenskurniawanwijaya@gmail.com',
//         'image' => 'contoh-img.jpeg'
//     ]);
// });
