<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
 
    $posts = Post::all();
    return view('index', ['posts'=>$posts ]);
  
})->middleware(['auth', 'verified'])->name('admin');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
    
    //Add Post
    Route::post('/add-post', [PostController::class, 'store'])->name('add-post'); 
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit'); 
    Route::post('/update/{id}', [PostController::class, 'update'])->name('update'); 
    Route::post('/delete/{id}', [PostController::class, 'destroy'])->name('delete'); 
  
    
});

require __DIR__.'/auth.php';
