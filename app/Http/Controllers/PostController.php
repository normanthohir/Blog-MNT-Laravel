<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->Filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post
        ]);
    }




    public function about()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('About', [
            "title" => "About",
            "active" => "about",
            'posts' => $latestPosts

        ]);
 
    }
}
