<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch employee index',
            'data' => $employees,
        ]);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully store employee',
            'data' => $employee,
        ]);
    }
}
