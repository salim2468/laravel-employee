

@extends('layouts.common')

@section('content')



    <h2 style="background-color: #9ca3af;padding: 8px;">Add Employee </h2>
    <div style="padding: 8px">
    <form method="post" action="{{route('employee.store')}}">
        @csrf
        <div class="form-group">
            <label> First Name</label>
            <input type="text" name="firstName" class="form-control"  placeholder="Enter First Name">
        </div>
        <div class="form-group">
            <label> Last Name</label>
            <input type="text" name="lastName" class="form-control"placeholder="Enter Last Name">
        </div>
        <div class="form-group">
            <label> Date of Birth</label>
            <input type="date" name="dob" class="form-control">
        </div>
        <div class="form-group">
            <label> Address</label>
            <input type="text" name="address" class="form-control"placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label> Mobile Number</label>
            <input type="number" name="mobile" class="form-control"placeholder="Enter Mobile Number">
        </div>
        <div class="form-group">
            <label> Designation</label>
            <input type="text" name="designation" class="form-control"placeholder="Enter Designation">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="number" name="salary" class="form-control"placeholder="Enter Salary">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
