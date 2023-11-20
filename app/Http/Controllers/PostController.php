<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::all();
        
        return view('posts.index', ['posts' => $posts]);
    }
    
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
        return view('posts.show', ['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    {
        $post = new Book();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->save();
        
        return redirect()->route('posts.index')->with('success', '作成されました！');
    }
    
    public function showSignUpForm()
    {
        return view('post.signup');
    }
    
    public function signUp(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique::users|max:255',
            'password' => 'required|string|min:8|confirmed',
            ]);
    }
}
?>