<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function store(Request $request)
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
