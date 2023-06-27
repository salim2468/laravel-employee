<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // to get only specific column with cetrain condition then following code of line
        // $employee = Employee::select('email','name')->where('status',1)->get();
        $employee = Employee::all();
        if (count($employee) > 0) {
            $response = [
                "message" => count($employee) . ' employees found',
                'status' => 1,
                "data" => $employee
            ];
        } else {
            $response = [
                "message" => count($employee) . ' employees found',
                'status' => 0,
            ];
        }
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'mobile' => 'required',
            'designation' => 'required',
            'salary' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            //return response()->json('sucess',200);
            $data = [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'dob' => $request->dob,
                'address' => $request->address,
                'mobile' => $request->mobile,
                'designation' => $request->designation,
                'salary' => $request->salary,

            ];
            try {
                $employee = Employee::create($data);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $employee = null;
            }
            if ($employee != null) {
                return response()->json([
                    'message' => 'User registered sucessfully',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Internal Server Error',
                ], 500);
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employee = Employee::find($id);
        if(is_null($employee)){
            $response = ['message'=>'User not found',"status"=>0];
        }else{
            $response = ['message'=>'User found',"status"=>1,"data"=>$employee];

        }
        return  response()->json($response,200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        //

        $employee = Employee::find($id);
        //p($employee->salary);
        //p($employee->all());
        //die();
        if(is_null($employee)){
            return response()->json(['status'=>0,'message'=>'User does not exits'],404);
        }else{
            DB::beginTransaction();
            try {
                $employee->salary = $request['salary'];
                $employee->save();
                DB::commit();

            }catch (\Exception $e){
                $employee = null;
                DB::rollBack();
            }

            if(is_null($employee)){
                return response()->json(
                    [
                        'status' => 0,
                        'message' => 'Internal Server Error',
                        'error_msg' => $e->getMessage()
                    ],
                    500
                );
            }else{
                return response()->json(['status'=>1,'message'=>'Salary updated sucessfully'],200);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // https://youtu.be/6wkscjQePxA?list=PLjVLYmrlmjGfiBKfgOFEbI4FDWvLwYh-e&t=864
        $employee = Employee::find($id);
        //p($employee->firstName);
        //p($employee->all());
        //die();
        if(is_null($employee)){
            return response()->json(['status'=>0,'message'=>'User does not exits'],404);
        }else{
            DB::beginTransaction();
            try {

                $employee->firstName=$request['firstName'];
                $employee->lastName=$request['lastName'];
                $employee->dob=$request['dob'];
                $employee->address=$request['address'];
                $employee->mobile=$request['mobile'];
                $employee->designation=$request['designation'];
                $employee->salary=$request['salary'];
                $employee->save();
                DB::commit();
            }catch (\Exception $e){
                DB::rollBack();
                $user = null;
            }
            if(is_null($employee)){
                return response()->json(
                    [
                        'status' => 0,
                        'message' => 'Internal Server Error',
                        'error_msg' => $e->getMessage()
                    ],
                    500
                );
            }else{
                return response()->json(['status'=>1,'message'=>'Data updated sucessfully'],200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $employee = Employee::find($id);
        echo $employee;
        if(is_null($employee)){
           $response = [
               'message' => "User does not exist",
               'status' => 0
           ];
           $respCode=404;
        }else{
            DB::beginTransaction();
            try {
                $employee->delete();
                DB::commit();
                $response = [
                    'message' => "User deleted sucessfully",
                    'status' => 1
                ];
               $respCode = 200;
            }
            catch (\Exception $e){
                DB::rollBack();
                $response = [
                    'message' => "Internal Server Error",
                    'status' => 1
                ];
                $respCode = 500;
            }
        }
        return response()->json($response,$respCode);

    }
}
