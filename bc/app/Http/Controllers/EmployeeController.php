<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    

    public function getEmployees(){

        return response()->json(['status' => "success","data" => Employee::all()],200);
    }

    public function getEmplyeeById($id){

        $employee = Employee::find($id);

        if(is_null($employee)){

            return response()->json(["status" => "fail","message" => "employee not found"],404);
        }

        return response()->json($employee,200);
    }

    public function addEmployee(Request $req){

        $employee = Employee::create($req->all());

        return response()->json($employee,201);
        
    }

    public function updateEmployee(Request $req,$id){

        $employee = Employee::find($id);

        if(is_null($employee)){

            return response()->json(['status' => 'error', 'message' => 'employee not found'],404);
        }

        $employee->update($req->all());

        return response()->json($employee);
    }

    public function deleteEmployee(Request $req,$id){

        $employee = Employee::find($id);

        if(is_null($employee)){

            return response()->json(['status' => 'error', 'message' => 'employee not found'],404);
        }

        $employee->delete($req->all());

        return response()->json(['status' => "success"]);

    }
}
