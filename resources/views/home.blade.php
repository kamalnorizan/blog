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
                            @foreach ($posts as $post)
                            {{$post->id}}. {{$post->title}} - {{$post->user->name}} <br>
                            @endforeach
                        </div>
                        {{-- <div class="col-md-6">
                            @foreach (Auth::user()->posts as $post)
                            {{$post->id}}. {{$post->title}} - {{$post->user->name}} <br>
                            @endforeach
                        </div> --}}
                    </div>

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Logged in user -> first post -> comments</div>

                <div class="card-body">

                    {!! Form::open(['method' => 'POST', 'url' => '/post/create']) !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            {!! Form::label('content', 'Content') !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('content') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('select') ? ' has-error' : '' }}">
                            {!! Form::label('select', 'Select') !!}
                            {!! Form::select('select',["1"=>"Lelaki", "2"=>"Perempuan"], null, ['id' => 'select', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('select') }}</small>
                        </div>

                        <div class="btn-group pull-right">
                            {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                            {!! Form::submit("Hantar", ['class' => 'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}

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
