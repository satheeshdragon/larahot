@extends('layouts.app')

@section('content')

    <div class="row">
        <?php ?>
        <div class="col-lg-12">
            <table class="table responsive">
                <thead style="background-color: #30364147;">
                <tr>
                    <th>no</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>ref_number</th>
                    <th>phone_number</th>
                    <th>address</th>
                    <th>address_two</th>
                    <th>country</th>
                    <th>state</th>
                    <th>city</th>
                    <th>email</th>
                    <th>pin_code</th>
                    <th>reference</th>
                    <th>unique_identy</th>
                </tr>
                </thead>

                <tbody>

                @foreach($employee as $key => $row)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td> {{ $row->employee_first_name }}</td>
                        <td> {{ $row->employee_last_name }}</td>
                        <td> {{ $row->employee_ref_number }} </td>
                        <td> {{ $row->employee_phone_number }} </td>
                        <td> {{ $row->employee_address }} </td>
                        <td> {{ $row->employee_address_two }} </td>
                        <td> {{ $row->employee_country }} </td>
                        <td> {{ $row->employee_state }} </td>
                        <td> {{ $row->employee_city }} </td>
                        <td> {{ $row->employee_email }} </td>
                        <td> {{ $row->employee_pin_code }} </td>
                        <td> {{ $row->employee_reference }} </td>
                        <td> {{ $row->employee_unique_identy }} </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $employee->links() !!}
        </div>
    </div>

    <div class="row"></div>

@endsection
