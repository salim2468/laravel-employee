@extends('layouts.common')

@section('content')
    <h5 style="background-color: #9ca3af;padding: 8px;">Employee List </h5>
    <div style="padding: 8px">
        <a href="{{route("dashboard")}}" class="aButton">DashBoard</a>
    <a href="{{route("employee.create")}}" class="aButton">Add Employee</a>
    <br>
    <br>
        <form action="/employee" method="" >
            <div class="form-group">
                <input type="search" name="search" class="from-control" value="{{$searchText}}" placeholder="Search" style="width:50%;">
                <button class="btn btn-dark" >Search</button>
            </div>
        </form>
        <br/>
        <table class="table table-striped" >
            <thead >
            <tr class="table-dark" >
                <th scope="col">Name</th>
                <th scope="col">DOB</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col">Designation</th>
                <th scope="col">Salary</th>
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
            </tr>
            </tbody>
            @endforeach
        </table>
    {{ $employees->appends(['search' => $searchText])->links()}}
    </div>
@endsection
