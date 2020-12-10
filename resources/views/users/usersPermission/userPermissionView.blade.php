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

            <strong>Users Permission</strong>
        </li>
    </ol>

    <div class="row">
        <div class="col-md-6"><h3>Users Permission View</h3></div>
        <div class="col-md-6">

        </div>
    </div>

    <br/>

    <form role="form" id="form1" method="post" class="validate form-horizontal form-groups-bordered" action="{{ route('userpermissionupdation') }}">
        @csrf

        <div class="form-group">
            <label class="control-label">Permission Name</label>
            <input type="hidden" name="master_id" value="{{ $permission['id']  }}">
            <input type="text" class="form-control" name="permission[permission_name]" data-validate="required" data-message-required="Please fill Role name" placeholder="Permission Name" value="{{ $permission['permission_name']  }}" />
        </div>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-5">
                @foreach ($userpermissionmodule as $row)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name=permission[module_id][] value="{{ $row['id'] }}" <?php echo (in_array($row['id'], $permission_module)) ? 'checked' : '' ?> >{{ $row['module_name'] }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('userpermission') }}" type="button" class="btn btn-blue">Back</a>
        </div>

    </form>

    <script>
        $(function(){
            $('input').attr('disabled',true);
            $('select').attr('disabled',true);
        })
    </script>

@endsection

