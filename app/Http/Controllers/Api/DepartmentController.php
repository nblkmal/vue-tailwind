<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('employees')->get();

        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch department index',
            'data' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        // TODO : add custom validation
        $department = Department::create([
            'name' => $request->name,
            'description' => $request->description,
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

    public function update(Department $department, Request $request)
    {
        $department->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully update department '.$department,
        ]);
    }

    public function uploadImage(Request $request, Department $department)
    {
        $request->validate([
            'image' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();

            Storage::disk('public')->put('department/'.$filename, File::get($request->image));

            $department->update(['image'=>$filename]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Successfully upload '.$department.' image',
        ]);
    }
    
}
