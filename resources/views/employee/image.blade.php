@extends('layouts.common')



@section('content')

    <h1>Upload Image</h1>
    {{$employee_id}}
    <form enctype="multipart/form-data" method="post" action="{{route('employee.upload',['employee_id'=>$employee_id]s)}}">
        @csrf
           <label>Select Image</label>
        <input type="file" name="image" class="form-control" >
        <br>
        <button class="btn btn-primary">Upload</button>
    </form>

@endsection
