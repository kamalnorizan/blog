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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        // $post = Post::find(1);
        $post = Post::first();
        dd($post->comments);

        $title = "First view";

        // dd($posts->content);
        return response()->json($posts->first()->comments);

        // return view('home',compact('posts','title'));
    }
}
