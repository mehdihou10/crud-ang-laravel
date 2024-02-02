<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    public function getEmployees(){

        return response()->json(['status' => "success", "data" => Employees::all()],200);
    }

    public function getEmployeeById($id){

        $employee = Employees::find($id);

        if(is_null($employee)){

            return response()->json(["status" => "fail",'message' => "not found"],404);

        } else{

            return response()->json(['status' => 'success', "employee" => $employee], 200);
        }
    }


    public function addEmployee(Request $req){

        $employee = Employees::create($req->all());

        return response()->json($employee,201);
    }

    
    public function updateEmployee(Request $req,$id){

        $employee = Employees::find($id);

        if(is_null($employee)){

            return response()->json(["status" => "fail",'message' => "not found"],404);

        } 

        $employee -> update($req->all());

        return response()->json(['status' => 'success', "employee" => $employee], 200);

    }

    public function deleteEmployee($id){

        $employee = Employees::find($id);

        if(is_null($employee)){

            return response()->json(["status" => "fail",'message' => "not found"],404);

        } 

        $employee -> delete();

        return response()->json(['message' => 'deleted successfully'],200);
    }
}
