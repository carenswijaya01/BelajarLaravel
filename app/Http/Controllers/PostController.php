<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'All Posts',
            'posts' => Post::with(['user', 'category'])->latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }

    public function showByCategory(Category $category)
    {
        return view('posts', [
            'title' => "Posts By Category: " . $category->name,
            'category' => $category->name,
            'posts' => $category->posts->load('user', 'category')
        ]);
    }

    public function showByAuthor(User $user)
    {
        return view('posts', [
            "title" => "Posts By Author: " . $user->name,
            "name" => $user->name,
            "posts" => $user->posts->load('user', 'category')
        ]);
    }
}
