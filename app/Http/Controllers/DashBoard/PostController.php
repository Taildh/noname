<?php

namespace App\Http\Controllers\DashBoard;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DashBoard\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all('id', 'name');
        return view('dashboard.post.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        try {
            Post::create([
                'user_id' => 1,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'detail' => $request->detail,
                'image' => $request->hasFile('image') ? '/' . $request->image->storeAs('images/posts', $request->image->getClientOriginalName()) : "",
                'status' => $request->status ? $request->status : 0
            ]);
            return redirect()->route('dashboard.posts.index')->with('success', 'Created post successfully!');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::all('id', 'name');
        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    public function update (PostRequest $request, Post $post)
    {
        try {
            $post->update([
                'user_id' => 1,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'detail' => $request->detail,
                'image' => $request->hasFile('image') ? '/' . $request->image->storeAs('images/posts', $request->image->getClientOriginalName()) : $request->old_image,
                'status' => $request->has('status') ? 1 : 0
            ]);
            return redirect()->route('dashboard.posts.index')->with('success', 'Updated post successfully!');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function destroy (Post $post)
    {
        dd($post);
    }
}
