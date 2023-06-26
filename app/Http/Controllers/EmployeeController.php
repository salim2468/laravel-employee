<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //

    public function index(Request $request)
    {
//        $u = Auth::user();
//        $id = Auth::id();
//        dd($id);
        $searchText = $request['search'] ?? "";


        if ($searchText != "") {

            $employees = Employee::where('firstName','LIKE',"%$searchText%")->orWhere('lastName','LIKE',"%$searchText%")->orWhere('address','LIKE',"%$searchText%")->orWhere('designation','LIKE',"%$searchText%")->paginate(5);

           // $students = Student::where('fullName','LIKE',"%$searchText%")->orWhere('address','LIKE',"%$searchText%")->paginate(10);
        }else{
           // $students = Student::paginate(10);
             $employees = Employee::paginate(5);

        }
        $data = compact('employees','searchText');
        return view('/employee/index', $data);



        //$employees = Employee::all();

        // employee.index means index file inside employee directory of view directory
        //return view('employee.index', ['employees' => $employees]);
    }

    public function create()
    {

        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'mobile' => 'required',
            'designation' => 'required',
            'salary' => 'required',


        ]);

        $employee = Employee::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),
            'designation' => $request->input('designation'),
            'salary' => $request->input('salary'),
        ]);

        // in case of redirect provide url
        return redirect('/dashboard');
    }

    public function show(string $employee_id)
    {
        $employee = Employee::find($employee_id);
        $profile_image = Profile::where('employee_id',$employee_id)->first();
//        echo $profile_image;
        return view('employee.show',['employee'=> $employee,'profile_image'=>$profile_image]);
    }

    public function edit(string $employee_id)
    {
        $employee = Employee::find($employee_id);
        return view('employee.edit')->with('employee',$employee);

    }
    public  function update(Request $request,string $employee_id){

        $employee = Employee::where('id',$employee_id)->update([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),
            'designation' => $request->input('designation'),
            'salary' => $request->input('salary'),
        ]);
        return redirect('/dashboard');
    }


    public function  image(Request $request,string $employee_id){
        //dd($employee_id);

        return view('employee.image')->with('employee_id',$employee_id);

    }

    public function  upload(Request $request,string $employee_id){
        //dd($employee_id);

        $request->validate(['image'=>'required']);

        $newImageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('profiles'),$newImageName);
        //echo 'profiles/'.$newImageName;
        $profile = Profile::create([
            'employee_id' =>$employee_id,
            'image_path' => 'profiles/'.$newImageName,
        ]);
        return redirect()->route('dashboard');
    }

    public  function destroy(Request $request,string $employee_id){
        $employee = Employee::find($employee_id);
        if (!is_null($employee)) {
            $employee->delete();
        }
        return redirect('/dashboard');
    }


}



