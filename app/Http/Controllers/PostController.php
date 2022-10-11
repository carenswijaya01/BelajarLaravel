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
        return view("posts", [
            "title" => "All Posts",
            "active" => "posts",
            "posts" => Post::latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view("post", [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }

    public function showByCategory(Category $category)
    {
        return view("posts", [
            "title" => "Posts By Category: " . $category->name,
            "active" => "posts",
            "category" => $category->name,
            "posts" => $category->posts->load("user", "category")
        ]);
    }

    public function showByAuthor(User $user)
    {
        return view("posts", [
            "title" => "Posts By Author: " . $user->name,
            "active" => "posts",
            "name" => $user->name,
            "posts" => $user->posts->load("user", "category")
        ]);
    }
}
