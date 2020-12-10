@extends('layouts.app')

@section('content')



    <ol class="breadcrumb bc-3">
        <li>
            <a href="#"><i class="fa-home"></i>Home</a>
        </li>
        <li>

            <a href="#">User Management system</a>
        </li>
        <li class="active">

            <strong>Users</strong>
        </li>
    </ol>

    <div class="row">
        <div class="col-md-6"><h3>Users</h3></div>
        <div class="col-md-6" >
            <a href="{{ route('useradd') }}" class="btn btn-success" style="float: right">Add User</a>
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
            <th>Email</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $row)
            <tr>
                <th>{{ ++$no }}</th>
                <td>{{ $row->email }}</td>
                <td><div class="label label-primary">{{ $row->userRole->role_name }}</div></td>
                <td>
                    <a href="{{ url('usermanage/userupdate/'.$row->id) }}" class="btn btn-default btn-sm btn-icon icon-left">
                        <i class="entypo-pencil"></i>
                        Edit
                    </a>

                    <button type="button" class="btn btn-danger btn-sm btn-icon icon-left"
                            onclick="deleteUserRole({{ $row['id'] }})">
                        <i class="entypo-cancel"></i>
                        Delete
                    </button>
                    <a href="{{ url('usermanage/userview/'.$row->id) }}" class="btn btn-info btn-sm btn-icon icon-left">
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
            <th>Email</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>



    {{-- Script For Delete --}}
    <script>
        function deleteUserRole(masterId) {
            jQuery('#modal-1').modal('show');
            $('.deleteid').val(masterId);
        }
    </script>

    {{-- DELETE MODEL--}}

    <!-- Modal 1 (Basic)-->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('userdestroy') }}" method="post">
                    @csrf

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">User Delete</h4>
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
