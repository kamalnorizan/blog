@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Post <a href="/post/create" class="btn btn-primary btn-sm float-right">New
                        Post</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Author
                                </th>
                                <th>
                                    Created At
                                </th>
                                <th width="270px">
                                    Action(s)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key=>$post)
                            <tr>
                                <td scope="row">
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$post->title}} ({{$post->comments->count()}})
                                </td>
                                <td>
                                    {{$post->user->name}}
                                </td>
                                <td>
                                    {{\Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}
                                </td>
                                <td>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy',$post->id]]) !!}
                                        <a href="/post/{{$post->id}}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{route('post.edit',[$post->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                        {!! Form::submit("Delete", ['class' => 'btn btn-danger btn-sm','onclick'=>'return confirm("Are you sure you want to remove this post?")']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
