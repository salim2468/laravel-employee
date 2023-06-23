

@extends('layouts.common')

@section('content')



    <h5 style="background-color: #9ca3af;padding: 8px;">Add Employee </h5>
    <div style="padding: 18px; background-color: whitesmoke;margin: 10px">
    <form method="post" action="{{route('employee.store')}}">
        @csrf
        <div class="form-group">
            <label> First Name</label>
            <input type="text" name="firstName" class="form-control"  placeholder="Enter First Name">
            @error('firstName')
            <div class="alert alert-danger" role="alert">
                <li>
                    {{$message}}
                </li>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label> Last Name</label>
            <input type="text" name="lastName" class="form-control"placeholder="Enter Last Name">
            @error('lastName')
            <div class="alert alert-danger" role="alert">
                <li>
                    {{$message}}
                </li>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label> Date of Birth</label>
            <input type="date" name="dob" class="form-control">
            @error('dob')
            <div class="alert alert-danger" role="alert">
                <li>
                    {{$message}}
                </li>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label> Address</label>
            <input type="text" name="address" class="form-control"placeholder="Enter Address">
            @error('address')
            <div class="alert alert-danger" role="alert">
                <li>
                    {{$message}}
                </li>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label> Mobile Number</label>
            <input type="number" name="mobile" class="form-control"placeholder="Enter Mobile Number">
            @error('mobile')
            <div class="alert alert-danger" role="alert">
                <li>
                    {{$message}}
                </li>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label> Designation</label>
            <input type="text" name="designation" class="form-control"placeholder="Enter Designation">
            @error('designation')
            <div class="alert alert-danger" role="alert">
                <li>
                    {{$message}}
                </li>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="number" name="salary" class="form-control"placeholder="Enter Salary">
            @error('salary')
            <div class="alert alert-danger" role="alert">
                <li>
                    {{$message}}
                </li>
            </div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>

</div>
@endsection
