@extends('layouts.app')

@section('content')



    <ol class="breadcrumb bc-3">
        <li>
            <a href="#"><i class="fa-home"></i>Home</a>
        </li>
        <li>

            <a href="#">User Management</a>
        </li>
        <li class="active">

            <strong>Users Role</strong>
        </li>
    </ol>

    <div class="row">
        <div class="col-md-6"><h3>Users Role Store</h3></div>
        <div class="col-md-6">

        </div>
    </div>

    <br/>

    <form role="form" id="form1" method="post" class="validate" action="{{ route('userrolestore') }}">
        @csrf

        <div class="form-group">
            <label class="control-label">Role Name</label>

            <input type="text" class="form-control" name="role[role_name]" data-validate="required" data-message-required="Please fill Role name" placeholder="Role Name" />
        </div>

        <div class="form-group">
            <label class="control-label">Role Permission</label>

{{--            <input type="text" class="form-control" name="role_permission" data-validate="required" data-message-required="Please fill Role permission" placeholder="Role Permission" />--}}
            <select class="select2" name="role[role_permission][]" multiple>
                @foreach ($userpermission as $row)
                <option value="{{ $row->id }}" >{{ $row->permission_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('userrole') }}" type="button" class="btn btn-blue">Back</a>
        </div>

    </form>



@endsection

