@extends('layouts.common')



@section('content')
    <style>


        .card {
            padding: 20px;
            border-style: solid;
            border-radius: 8px;
            background-color: #ededed;
            margin: 20px;

        }

        td {
            text-align: center;
        }

    </style>

        <h2 style="background-color: #9ca3af;padding: 8px;">Employee </h2>
    <div style="padding: 8px;">

        <div style="display: flex; flex-wrap: wrap;justify-content: center;align-items: center">
            <div class="card">
                <table>
                    @if($profile_image)
                        <tr>
                            <td>
                                <img
                                    src="{{asset($profile_image->image_path) }}"
                                    alt="Img"
                                    height="160"
                                    width="160"
                                    style="border-radius: 80px"
                                />
                            </td>
                        </tr>

                    @else
                        <tr>
                            <td >
                                <img
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                    alt="Img"
                                    height="160"
                                    width="160"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td class="aButton">
                                <a href="{{route('employee.image',['employee_id'=>$employee->id])}}"
                                >
                            <span class="material-symbols-outlined">
                                camera
                            </span>
                                </a>
                            </td>

                        </tr>
                    @endif


                </table>

            </div>
            <div class="card">
                <table width="350">


                    <tr>
                        <td>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item" style="width: 100%;">Name</li>
                                <li class="list-group-item" style="width: 100%;">{{$employee->firstName}} {{$employee->lastName}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item" style="width: 100%;">Address</li>
                                <li class="list-group-item" style="width: 100%;">{{$employee->address}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item" style="width: 100%;">Mobile</li>
                                <li class="list-group-item" style="width: 100%;">{{$employee->mobile}}</li>
                            </ul>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item" style="width: 100%;">DOB</li>
                                <li class="list-group-item" style="width: 100%;">{{$employee->dob}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item" style="width: 100%;">Designation</li>
                                <li class="list-group-item" style="width: 100%;">{{$employee->designation}}</li>
                            </ul>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item" style="width: 100%;">Salary</li>
                                <li class="list-group-item" style="width: 100%;">{{$employee->salary}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('employee.edit',['employee_id'=>$employee->id])}}" style="text-decoration: none">

                            <div class="aButton">

                                    Edit
                                    <span class="material-symbols-outlined" style="font-size: 15px">
                                edit
                            </span>

                            </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form method="post" action="{{route('employee.destroy',['employee_id'=>$employee->id]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" style="width: 100%"> Delete</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
