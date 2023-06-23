@extends('layouts.common')



@section('content')

    <h5 style="background-color: #9ca3af;padding: 8px;">Upload Image</h5>
    <div style="padding: 18px; background-color: whitesmoke;margin: 10px">

    <form enctype="multipart/form-data" method="post" action="{{route('employee.upload',['employee_id'=>$employee_id])}}">
        @csrf
           <label>Select Image</label>
        <input type="file" name="image" class="form-control" >
        <br>
        <button class="btn btn-dark">Upload</button>
    </form>
    </div>

@endsection
