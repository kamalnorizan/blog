@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($posts->count()>0)
                                @foreach ($posts as $post)
                                <a href="{{route('comment.mynumber',[$post->id])}}">Comment</a>
                                {{$post->id}}. {{$post->title}} - {{$post->user->name}} <br>
                                @endforeach
                            @else
                            <center>No post found</center>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>


    @endsection
