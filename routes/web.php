<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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

// menit 27:07


Route::get('/', function () {
    return view('home', [
        "title" => "home",
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "name" => "EKO PRAMONO",
        "email" => "ekopram@yahoo.com",
        "images" => "chaewon.jpg",
        'active' => 'categories'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');












// <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus accusamus eos excepturi magnam sapiente maiores ea dolor qui vero adipisci, libero delectus. Quasi, a! Eum laboriosam architecto magni, laudantium reiciendis magnam? Nemo placeat, incidunt atque esse est ex iusto dicta, rerum iure dolores quasi. </p><p>Vel sunt voluptatem, pariatur architecto odit, in asperiores nobis molestias ab autem optio rerum fugit dolor saepe est sequi voluptatum ratione fuga temporibus? Necessitatibus repudiandae repellendus voluptates doloremque, enim distinctio temporibus, eius ducimus magnam molestias dolores tenetur ipsa! Beatae quod, temporibus id quasi, veniam cumque itaque distinctio iure doloribus eaque eos quae voluptatem vero dolores in assumenda earum tenetur voluptates eum ab sapiente. </p><p>Cupiditate magnam consectetur nemo exercitationem molestias eum atque, officia totam accusantium, velit autem repellat? Voluptas tempora quis molestias hic ipsum excepturi quae expedita nam nobis vel aut neque iste distinctio adipisci laboriosam voluptatum, quisquam quaerat dolorem? Molestias est repellendus quae labore, assumenda dolore?</p>






// Post::create([
//     'title' => 'judul pertama',
//     'slug' => 'judul-pertama',
//     'excerpt' => 'lorem ipsum kedua',
//     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus accusamus eos excepturi magnam sapiente maiores ea dolor qui vero adipisci, libero delectus. Quasi, a! Eum laboriosam architecto magni, laudantium reiciendis magnam? Nemo placeat, incidunt atque esse est ex iusto dicta, rerum iure dolores quasi. </p><p>Vel sunt voluptatem, pariatur architecto odit, in asperiores nobis molestias ab autem optio rerum fugit dolor saepe est sequi voluptatum ratione fuga temporibus? Necessitatibus repudiandae repellendus voluptates doloremque, enim distinctio temporibus, eius ducimus magnam molestias dolores tenetur ipsa! Beatae quod, temporibus id quasi, veniam cumque itaque distinctio iure doloribus eaque eos quae voluptatem vero dolores in assumenda earum tenetur voluptates eum ab sapiente. </p><p>Cupiditate magnam consectetur nemo exercitationem molestias eum atque, officia totam accusantium, velit autem repellat? Voluptas tempora quis molestias hic ipsum excepturi quae expedita nam nobis vel aut neque iste distinctio adipisci laboriosam voluptatum, quisquam quaerat dolorem? Molestias est repellendus quae labore, assumenda dolore?</p>'
// ])

// $post = new Post
// $post->category_id = 1,
// $post->title = 'Judul pertama'
// $post->slug = 'judul-pertama'
// $post->excerpt = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
// $post->body = '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus accusamus eos excepturi magnam sapiente maiores ea dolor qui vero adipisci, libero delectus. Quasi, a! Eum laboriosam architecto magni, laudantium reiciendis magnam? Nemo placeat, incidunt atque esse est ex iusto dicta, rerum iure dolores quasi. </p><p>Vel sunt voluptatem, pariatur architecto odit, in asperiores nobis molestias ab autem optio rerum fugit dolor saepe est sequi voluptatum ratione fuga temporibus? Necessitatibus repudiandae repellendus voluptates doloremque, enim distinctio temporibus, eius ducimus magnam molestias dolores tenetur ipsa! Beatae quod, temporibus id quasi, veniam cumque itaque distinctio iure doloribus eaque eos quae voluptatem vero dolores in assumenda earum tenetur voluptates eum ab sapiente. </p><p>Cupiditate magnam consectetur nemo exercitationem molestias eum atque, officia totam accusantium, velit autem repellat? Voluptas tempora quis molestias hic ipsum excepturi quae expedita nam nobis vel aut neque iste distinctio adipisci laboriosam voluptatum, quisquam quaerat dolorem? Molestias est repellendus quae labore, assumenda dolore?</p>'
// $post->save()
