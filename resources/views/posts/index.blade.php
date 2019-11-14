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
                                <th>
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
                                    {{$post->title}}
                                </td>
                                <td>
                                    {{$post->user->name}}
                                </td>
                                <td>
                                    {{\Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}
                                </td>
                                <td>


                                    {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy',$post->id], 'onClick'=>'return confirm("Are you sure") ']) !!}

                                    <a href="/post/{{$post->id}}" class="btn btn-info btn-sm">Show</a>
                                    <a href="/post/{{$post->id}}/edit" class="btn btn-warning btn-sm">Edit</a>

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
