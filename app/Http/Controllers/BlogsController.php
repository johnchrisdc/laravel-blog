<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    function homeView() {
        $blogs = Blog::all();

        return view('blog.home', ['blogs' => $blogs]);
    }

    function newBlogView() {
        return view('blog.new');
    }

    function editBlogView(Request $request) {
        $blogId = $request->route('blog_id');

        $blog = Blog::find($blogId);

        return view('blog.edit', ['blog' => $blog]);
    }

    function saveBlog(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        Blog::create($validated);

        return redirect()->route('blog.home');
    }

    function updateBlog(Request $request) {
        $blogId = $request->route('blog_id');

        $validated = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        $blog = Blog::findOrFail($blogId);
        $blog->update($validated);

        return redirect()->route('blog.home');
    }

    function deleteBlog(Request $request) {
        $blogId = $request->route('blog_id');

        $blog = Blog::find($blogId);
        $blog->delete();

        return redirect()->route('blog.home');
    }
}
