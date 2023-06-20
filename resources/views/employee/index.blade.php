@extends('layouts.common')

@section('content')
    <h2 style="background-color: #9ca3af;padding: 8px;">Employee List </h2>

    <div style="padding: 8px">
    <a href="{{route("employee.create")}}" class="aButton">Add Employee</a>

    <br>
    <br>


        <table class="table table-striped" >
            <thead >
            <tr class="table-dark" >
                <th scope="col">Name</th>
                <th scope="col">DOB</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col">Designation</th>
                <th scope="col">Salary</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>

            </tr>
            </thead>
            @foreach ($employees as $employee)

            <tbody>
            <tr>
                <td >

                        <a href="{{route('employee.show',['employee_id'=>$employee->id])}}" style="text-decoration: none;color: #1a202c">
                            <span class="material-symbols-outlined" >
                                info
                            </span>
                            {{$employee->firstName}} {{$employee->lastName}}
                        </a>

                </td>
                <td>{{$employee->dob}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->mobile}}</td>
                <td>{{$employee->designation}}</td>
                <td>{{$employee->salary}}</td>
                <td>{{$employee->created_at}}</td>
                <td>{{$employee->updated_at}}</td>


            </tr>
            </tbody>
            @endforeach

        </table>
    </div>


@endsection
