<?php
// MovieController.php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Movie;
use App\Models\Like;
use App\Models\Dislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public $key;
    public function show($id)
    {
        
        return view('posts');
    }
    public function index($id)
    {
        $posts = Post::where('movie_id', $id)->get();
        $this->key = $id;

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['movie_id'] = 54;


        Post::create($validatedData);

        return redirect()->route('posts.index',['id' => 54]);
    }

    public function like($id)
    {
        $post = Post::find($id);

        $like = new Like();
        $like->user_id = Auth::id();
        $post->likes()->save($like);

        return redirect()->back();
    }

    public function dislike($id)
    {
        $post = Post::find($id);

        $dislike = new Dislike();
        $dislike->user_id = Auth::id();
        $post->dislikes()->save($dislike);

        return redirect()->back();
    }
    
}
