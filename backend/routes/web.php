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

Route::get('/', 'WelcomeController@index')->name('public.welcome');
Route::get('posts/{post}/{slug?}', [PostsController::class, 'show'])->name('public.show');
Route::get('categories/{category}', [PostsController::class, 'category'])->name('public.category');
Route::get('tag/{tag}', [PostsController::class, 'tag'])->name('public.tag');

Route::prefix('admin')->group(function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::middleware(['auth'])->group(function() {
        Route::get('/home', 'HomeController@index')->name('admin.home');

        Route::resource('categories', 'CategoriesController', ['as' => 'admin']);
    
        Route::resource('tags', 'TagsController', ['as' => 'admin']);
    
        Route::resource('posts', 'PostsController', ['as' => 'admin']);    
        Route::get('trashed-posts', 'PostsController@trashed')->name('admin.trashed-posts.index');
        Route::put('restore-post/{post}', 'PostsController@restore')->name('admin.restore-post');
    
        Route::get('users/profile', 'UsersController@edit')->name('admin.users.edit-profile');
        Route::put('users/profile', 'UsersController@update')->name('admin.users.update-profile');
    });
    
    Route::middleware(['auth', 'admin'])->group(function() {
        Route::get('users', 'UsersController@index')->name('admin.users.index');
        Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('admin.users.make-admin');
    });
});