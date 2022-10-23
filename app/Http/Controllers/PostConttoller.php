<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class PostConttoller extends Controller
{
    use WithPagination;

    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Accedemos al metodo create de la policy app\Policies\PostPolicy.php
        // de esta forma no pueden acceder directamente a la url de forma manual para crear un post
        // aparece el error 403 THIS ACTION IS UNAUTHORIZED.
        $this->authorize('create', Post::class);

        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Dentro del metodo store cuando el usuario intenta crear el post,
        // una vez envia la peticion aparece el error 403 THIS ACTION IS UNAUTHORIZED.
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
        ]);
        Post::create($validated);

        return to_route('posts.index')->with('message', 'Post created successfully!!.');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', User::class, Post::class);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', User::class, Post::class);

        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
        ]);
        $post->update($validated);

        return to_route('posts.index')->with('message', 'Post updated successfully!!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', User::class, Post::class);

        $post->delete();

        return back()->with('message', 'Post deleted successfully!!.');
    }
}
