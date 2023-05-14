<?php
// MovieController.php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Movie;
use App\Models\Like;
use App\Models\Dislike;
use App\Services\MailService;
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
        $movie_id = $id;

        return view('posts.index', compact('posts', 'movie_id'));
    }

    public function create($movie_id)
    {
        return view('posts.create',compact('movie_id'));
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'text' => 'required|max:255',
    //     ]);

    //     $validatedData['user_id'] = Auth::id();
    //     $validatedData['movie_id'] = $request->input('movie_id');

    //     Post::create($validatedData);

    //     // return redirect()->route('posts.index',['id' => 54]);
    //     return redirect()->route('posts.index', ['id' => $validatedData['movie_id']]);
    // }
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'text' => 'required|max:255',
    ]);

    $validatedData['user_id'] = Auth::id();
    $validatedData['movie_id'] = $request->input('movie_id');

    Post::create($validatedData);
    return redirect()->route('posts.index', ['id' => $validatedData['movie_id']]);
    // return response()->json(['message' => 'Post created successfully']);
    //return response()->json(['movie_id' => $validatedData['movie_id']]);
    
    }

    public function like($id,MailService $mailService)
    {
        $post = Post::find($id);

        $like = new Like();
        $like->user_id = Auth::id();
        $post->likes()->save($like);
        // Send email
        // \Mail::to($post->user)->send(new \App\Mail\PostReacted($post, 'like'));
        $mailService->sendPostReactedMail($post->user, $post,'like');

        return redirect()->back();
    }

    public function dislike($id,MailService $mailService)
    {
        $post = Post::find($id);

        $dislike = new Dislike();
        $dislike->user_id = Auth::id();
        $post->dislikes()->save($dislike);
        //  \Mail::to($post->user)->send(new \App\Mail\PostReacted($post, 'dislike'));
        $mailService->sendPostReactedMail($post->user, $post, 'dislike');

        return redirect()->back();
    }
    
    public function edit($id,$movie_id)
    
    { 
    $post = Post::findOrFail($id);
    if ($post->user_id != Auth::id()) {
        return redirect()->route('posts.index', ['id' => $movie_id]);
    }

    return view('posts.edit', compact('post','movie_id'));
    }

    public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    $movie_id = $request->input('movie_id');
    
    if (empty($movie_id)) {
        // Handle the error, e.g.:
        // throw new \Exception('Movie ID is required.');
        // Or provide a default value:
        $movie_id = $post->movie_id; // use the movie_id from the post, assuming it exists
    }
    
    if ($post->user_id != Auth::id()) {
        return redirect()->route('posts.index', ['id' => $movie_id]);
    }

    $validatedData = $request->validate([
        'text' => 'required|max:255',
    ]);

    $post->update($validatedData);

    return redirect()->route('posts.index',['id' =>$movie_id]);
}

public function myPosts()
{
    $posts = Auth::user()->posts;
    return view('posts.myPosts', ['posts' => $posts]);
}
public function delete($id, $movie_id)
{
    $post = Post::findOrFail($id);

    // Ensure the authenticated user is the owner of the post
    if (Auth::id() == $post->user_id) {
        $post->delete();
    }

    return redirect()->route('posts.index', ['id' => $movie_id]);
}


    
}
