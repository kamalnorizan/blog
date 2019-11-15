@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Assign Role</div>

                <div class="card-body">
                   {!! Form::open(['method' => 'POST', 'route' => ['assign.role',$user->id]]) !!}

                       <div class="form-group{{ $errors->has('role[]') ? ' has-error' : '' }}">
                           {!! Form::label('role[]', 'Role') !!}
                           {!! Form::select('role[]',$roles->pluck('name'), null, ['id' => 'role[]', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                           <small class="text-danger">{{ $errors->first('role[]') }}</small>
                       </div>

                       <div class="btn-group pull-right">
                           {!! Form::submit("Assign", ['class' => 'btn btn-success']) !!}
                       </div>

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Assign Permission</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => ['assign.permission',$user->id]]) !!}

                        <div class="form-group{{ $errors->has('permission[]') ? ' has-error' : '' }}">
                            {!! Form::label('permission[]', 'Role') !!}
                            {!! Form::select('permission[]',$permissions->pluck('name'), null, ['id' => 'permission[]', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                            <small class="text-danger">{{ $errors->first('permission[]') }}</small>
                        </div>

                        <div class="btn-group pull-right">
                            {!! Form::submit("Assign", ['class' => 'btn btn-success']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
