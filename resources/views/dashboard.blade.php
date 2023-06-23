<x-app-layout>
    <style>

        a:hover{
            background-color: #cbd5e0;
            color: black;
            padding: 8px 12px;
            border-bottom-width: 2px;
            border-bottom-color: #9ca3af;
        }
    </style>


{{--    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 8px 0px;">--}}
{{--        <strong>{{ __("You're logged in!") }}</strong>--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>--}}
{{--    </div>--}}

    <br>
    <br>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 text-gray-900">
                <a href="/employee" >
                    Employee
                </a>
                <a href="{{route("employee.create")}}" class="aButton" style="margin: 8px;">Add Employee</a>

            </div>


        </div>

    </div>


        <br>
        <br>




    <div style="padding: 8px; margin: 8px;display: flex;
    flex-direction: column;
    align-items: center;">

        <form action="/employee" method=""  style="align-items: center">
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
        {{ $employees->appends(['search' => $searchText])->links() }}

    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</x-app-layout>
