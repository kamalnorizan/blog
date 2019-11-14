@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Roles & Permissions</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Role</h3>
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
                                        {{$role->permissions}}
                                    </td>
                                    <td>

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
                                        {{$perrmission->name}}
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
</div>
</div>
@endsection
