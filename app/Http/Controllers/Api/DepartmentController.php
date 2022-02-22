<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch department index',
            'data' => $departments,
        ]);
    }

    public function store()
    {
        $department = Department::create([
            'name',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully store department',
            'data' => $department,
        ]);
    }

    public function delete(Department $department)
    {
        $department->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully delete department',
        ]);
    }
    
}
