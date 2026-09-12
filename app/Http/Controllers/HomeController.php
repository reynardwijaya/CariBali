<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the public landing page.
     */
    public function index()
    {
        $posts = Post::paginate(6); // 6 posts per page for Favorite Places
        $locations = Post::distinctLocations();
        $featuredPosts = Post::orderByDesc('rating')->orderByDesc('id')->take(8)->get(); // Explore Bali carousel

        return view('home.homepage', compact('posts', 'locations', 'featuredPosts'));
    }
}
