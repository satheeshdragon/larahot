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
        <div class="col-md-6"><h3>Users Role View</h3></div>
        <div class="col-md-6">

        </div>
    </div>

    <br/>

    <form role="form" id="form1" method="post" class="validate" action="{{ route('userroleupdation') }}">
        @csrf

        <div class="form-group">
            <label class="control-label">Role Name</label>
            <input type="hidden" name="master_id" value="{{ $userrole['id'] }}">
            <input type="text" class="form-control" name="role[role_name]" data-validate="required" data-message-required="Please fill Role name" placeholder="Role Name" value="{{ $userrole['role_name'] }}" />
        </div>

        <div class="form-group">
            <label class="control-label">Role Permission</label>

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

    <script>
        $(function(){
            $('input').attr('disabled',true);
            $('select').attr('disabled',true);
            $(".select2").val([{{ $userrole['role_permission'] }}]).trigger('change');
        })
    </script>

@endsection

