

@extends('layouts.common')

@section('content')



<div style="margin: 0px 60px;">
    <h2>Edit Employee {{$employee->firstName}}</h2>
    {{$employee->id}}
    <form method="post" action="{{route('employee.update',['employee_id'=>$employee->id])}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label> First Name</label>
            <input type="text" value="{{$employee->firstName}}" name="firstName" class="form-control"  placeholder="Enter First Name">
        </div>
        <div class="form-group">
            <label> Last Name</label>
            <input type="text" value={{$employee->lastName}} name="lastName" class="form-control"placeholder="Enter Last Name">
        </div>
        <div class="form-group">
            <label> Date of Birth</label>
            <input type="date" value={{$employee->dob}} name="dob" class="form-control">
        </div>
        <div class="form-group">
            <label> Address</label>
            <input type="text" value={{$employee->address}} name="address" class="form-control"placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label> Mobile Number</label>
            <input type="number" value={{$employee->mobile}} name="mobile" class="form-control"placeholder="Enter Mobile Number">
        </div>
        <div class="form-group">
            <label> Designation</label>
            <input type="text" value={{$employee->designation}} name="designation" class="form-control"placeholder="Enter Designation">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="number" value={{$employee->salary}} name="salary" class="form-control"placeholder="Enter Salary">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
