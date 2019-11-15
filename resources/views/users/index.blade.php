@extends('layouts.app')

{{-- @section('head')
<link rel="stylesheet" href="{{ asset('footable/css/footable.bootstrap.css') }}" />
@endsection --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Roles & Permissions</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Role<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#create-role-modal">Create Role</button></h3>

                            <table class="table">
                                <tr>
                                    <th>
                                        Role
                                    </th>
                                    <th>
                                        Role Permissions
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{$role->name}}
                                    </td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                        <span class="badge badge-primary">{{$permission->name}}</span>
                                        @endforeach
                                        {{-- {{$role->permissions}} --}}
                                    </td>
                                    <td>
                                        <a href="/user/role-permission/{{$role->id}}"
                                            class="btn btn-sm btn-warning">Permission</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h3>Permission</h3>
                            <table class="table">
                                <tr>
                                    <th>
                                        Permission
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>
                                        {{$permission->name}}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- user list --}}
    <div class="row justify-content-center" style="padding-top: 16px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    User List
                </div>
                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'user.filter', 'class' => 'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('limit') ? ' has-error' : '' }}">
                            {!! Form::select('limit', ['5'=>'5', '10'=>'10', '50'=>'50', '100'=>'100'], $limit, ['id' => 'limit', 'class' => '', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('limit') }}</small>
                            {!! Form::submit("Go", ['class' => 'btn btn-success']) !!}
                        </div>

                        {{-- <div class="btn-group pull-right">
                            {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                        </div> --}}

                    {!! Form::close() !!}
                    <table class="table">
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                Email
                            </td>
                            <td>
                                Role(s)
                            </td>
                            <td>
                                Permission(s)
                            </td>
                            <td>
                                Action(s)
                            </td>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                @foreach ($user->roles as $role)
                                <span class="badge badge-primary">{{$role->name}}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($user->permissions as $permission)
                                <span class="badge badge-primary">{{$permission->name}}</span>
                                @endforeach
                            </td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">
                                {{$users->links()}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="create-role-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'role.create']) !!}
            <div class="modal-body">

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    {!! Form::label('role', 'Role') !!}
                    {!! Form::text('role', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('role') }}</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="{{ asset('footable/js/footable.js') }}"></script> --}}
{{-- <script>
    $(function() {
            $('.footable').footable();
    });
</script> --}}
@endsection
