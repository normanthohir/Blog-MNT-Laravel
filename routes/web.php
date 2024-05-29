<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\Post;
use App\Models\User;


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

// unutk menjelangkan browser php artisan serve

Route::get('/', function () {
    // Mendapatkan semua posting terurut dari yang terbaru
    $posts = Post::orderBy('created_at', 'desc')->get();

    // Mendapatkan satu posting secara acak
    $randomPost = Post::inRandomOrder()->first();
    $randomPosts = $posts->shuffle()->take(2);

    return view('home', [
        'title' => 'Home',
        'active' => 'home',
        'categories' => Category::all(),
        'posts' => $posts,
        'randomPost' => $randomPost,
        'randomPosts'=> $randomPosts
    ]);
});

Route::get('/about', [PostController::class, 'about']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('post/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Category',
        'active' => 'categories',
        'categories' => Category::all()

    ]);
});

//                  membuat controller yang di dalamnya ada method index
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest'); //yang isa mengaksesk hanya guest
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function () {
    return View('dashboard.index');
})->middleware('auth'); //middleware('auth') untuk oleh orng yang sudah login

// check slug post
Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// check slug category
Route::get('dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// buatkan rourte baru untuk mengarah ke controller category
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('admin');

// link id category jadi slug
Route::get('/dashboard/categories/{slug}/edit', 'AdminCategoryController@edit');
Route::delete('/dashboard/categories/{slug}', 'AdminCategoryController@destroy');

// profile
Route::resource('/dashboard/profiles', ProfileController::class)->middleware('auth');
Route::get('/dashboard/profiles', [ProfileController::class, 'index']);
Route::get('/dashboard/profiles/{username}/edit', 'ProfileController@edit');


// Route::get('/dashboard/profiles', [ProfileController::class]);

// allusers
Route::get('/dashboard/allusers', function () {
    return view('dashboard.allusers.index',  [
       'users' => User::paginate(10)
    ]);
})->middleware('auth')->middleware('admin');