@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>

                <div class="card-body">
                   {{$post->content}}
                </div>
            </div>

            <br><br>
            <h4>Comments</h4>

            @foreach ($post->comments as $comment)
            <br>
            <div class="card">
                <div class="card-body">
                <p><em>{{$comment->comment}}</em><strong> - {{$comment->user->name}}</strong></p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
