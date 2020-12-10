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
        <div class="col-md-6"><h3>Users Permission</h3></div>
        <div class="col-md-6">
            <a href="{{route('userpermissionadd')}}" type="button" class="btn btn-success" style="float: right">Add Permission
                </a>
        </div>
    </div>

    <br/>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var $table4 = jQuery("#table-4");

            $table4.DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });
    </script>

    <table class="table table-bordered datatable" id="table-4">
        <thead>
        <tr>
            <th>S.no</th>
            <th>User.Permission.Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($permission as $row)
            <tr>
                <th>{{ ++$no }}</th>
                <td>{{ $row['permission_name'] }}</td>
                <td>
                    <a href="{{ url('usermanage/userpermissionupdate/'.$row['id']) }}"
                       class="btn btn-default btn-sm btn-icon icon-left">
                        <i class="entypo-pencil"></i>
                        Edit
                    </a>

                    <button type="button" class="btn btn-danger btn-sm btn-icon icon-left"
                            onclick="deleteUserPermission({{ $row['id'] }})">
                        <i class="entypo-cancel"></i>
                        Delete
                    </button>

                    <a href="{{ url('usermanage/userpermissionview/'.$row['id']) }}"
                       class="btn btn-info btn-sm btn-icon icon-left">
                        <i class="entypo-info"></i>
                        View
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>S.no</th>
            <th>User.Permission.Name</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>


    {{-- Script For Delete --}}
    <script>
        function deleteUserPermission(masterId) {
            jQuery('#modal-permission').modal('show');
            $('.deleteid').val(masterId);
        }
    </script>

    {{-- DELETE MODEL--}}

    <!-- Modal 1 (Basic)-->
    <div class="modal fade" id="modal-permission">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('userpermissiondestroy') }}" method="post">
                    @csrf

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">User Permission Delete</h4>
                    </div>

                    <div class="modal-body">
                        Are You Sure Want To Delete
                        <input type="hidden" name="masterid" class="deleteid" value="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection
