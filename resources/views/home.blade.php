@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            @foreach ($posts as $post)
                            {{$post->id}}. {{$post->title}} - {{$post->user->name}} <br>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            @foreach (Auth::user()->posts as $post)
                            {{$post->id}}. {{$post->title}} - {{$post->user->name}} <br>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Logged in user -> first post -> comments</div>

                <div class="card-body">

                    1st Post Title: {{Auth::user()->posts->first()->title}} <br>
                    {{Auth::user()->posts->first()->content}} <br><br><br>
                    <strong>Comments:</strong> <br>
                    @foreach (Auth::user()->posts->first()->comments as $comment)

                    <div class="card card-body">
                        {{$comment->comment}}  <em>~{{$comment->user_id}}</em>
                    </div> <br>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection
