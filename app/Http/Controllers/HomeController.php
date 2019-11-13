<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $posts = Post::where('user_id',Auth::id())->get();
        $posts = Post::with('comments.user', 'user')->where('user_id', Auth::id())->get();
        // $post = Post::find(1);
        $post = Post::first();
        // dd($posts);

        $title = "First view";

        // dd($posts->content);
        // return response()->json($posts);

        return view('home', compact('posts', 'title'));
    }

    public function edit()
    {
        echo 'This is from edit method';
    }
}
