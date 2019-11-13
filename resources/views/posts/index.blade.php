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
                                    <a href="/post/{{$post->id}}" class="btn btn-info btn-sm">Show</a>
                                    <a href="/post/{{$post->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-id="{{$post->id}}" data-target="#deleteModal">
                                        Remove
                                    </button>
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center><i class="fa fa-times fa-5x text-danger"></i></center>
            <br> Are you sure you want to remove this post?
            </div>
            <div class="modal-footer">
                {!! Form::open(['method' => 'POST', 'route' => 'post.delete']) !!}
                {!! Form::hidden('id', 'value', ['id'=>'post_id']) !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#deleteModal').on('show.bs.modal', function (event) {
                // alert('test');
                    var button = $(event.relatedTarget);
                    var id = button.data('id');

                    $('#post_id').val(id);

            });
        });
    </script>
@endsection
