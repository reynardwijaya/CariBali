<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $locations = Post::distinctLocations();

        return view('admin.posts.index', compact('posts', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'category' => 'required|string|in:' . implode(',', array_keys(Post::CATEGORIES)),
            'location' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'maps_link' => 'nullable|url'
        ]);

        $data = $request->all();
        $data['location'] = Str::title(trim($request->location));

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'placeholder.jpg';
        }

        Post::create($data);

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'category' => 'required|string|in:' . implode(',', array_keys(Post::CATEGORIES)),
            'location' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'maps_link' => 'nullable|url'
        ]);

        $data = $request->all();
        $data['location'] = Str::title(trim($request->location));

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it's not the default
            if ($post->image !== 'placeholder.jpg' && file_exists(public_path('images/posts/' . $post->image))) {
                unlink(public_path('images/posts/' . $post->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);
            $data['image'] = $imageName;
        }

        $post->update($data);

        return redirect()->back()->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete image if it's not the default
        if ($post->image !== 'placeholder.jpg' && file_exists(public_path('images/posts/' . $post->image))) {
            unlink(public_path('images/posts/' . $post->image));
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
