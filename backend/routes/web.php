<?php
use \App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('posts/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('tag/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Route::prefix('admin')->group(function() {
    Auth::routes(['register' => false, 'reset' => false]);
    
    Route::middleware(['auth'])->group(function() {
        Route::get('/home', 'HomeController@index')->name('home');
    
        Route::resource('categories', 'CategoriesController');
    
        Route::resource('tags', 'TagsController');
    
        Route::resource('posts', 'PostsController');    
        Route::get('trashed-posts', 'PostsController@trashed')->name('trahsed-posts.index');
        Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-post');
    
        Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
        Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
    });
    
    Route::middleware(['auth', 'admin'])->group(function() {
        Route::get('users', 'UsersController@index')->name('users.index');
        Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    });
});