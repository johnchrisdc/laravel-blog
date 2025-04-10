<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;

Route::get('/', [BlogsController::class, 'homeView'])->name('blog.home');

Route::get('/new_blog', [BlogsController::class, 'newBlogView'])->name('blog.new');
Route::post('/new_blog', [BlogsController::class, 'saveBlog'])->name('blog.new');

Route::get('/edit_blog/{blog_id}', [BlogsController::class, 'editBlogView'])->name('blog.edit');
Route::put('/edit_blog/{blog_id}', [BlogsController::class, 'updateBlog'])->name('blog.edit');

Route::delete('/delete_blog/{blog_id}', [BlogsController::class, 'deleteBlog'])->name('blog.delete');