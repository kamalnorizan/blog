@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Assign Permission(s) to {{$role->name}}</div>

                <div class="card-body">
                   {!! Form::open(['method' => 'POST', 'url' => '/user/updatepermission/'.$role->id, 'class' => 'form-horizontal']) !!}
                        <div class="form-group{{ $errors->has('permission[]') ? ' has-error' : '' }}">
                            {!! Form::label('permission[]', 'Please Select Permission') !!}
                            {!! Form::select('permission[]',$permissionOption,$role->permissions->pluck('name'), ['id' => 'permission', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                            <small class="text-danger">{{ $errors->first('permission[]') }}</small>
                        </div>

                       <div class="btn-group pull-right">
                           {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                           {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
                       </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
