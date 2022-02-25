<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('country', 'state', 'city')->get();
        // $employees = Employee::all();
        
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
            'date_hired' => $request->date_hired,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully store employee',
            'data' => $employee,
        ]);
    }

    public function uploadImage(Request $request, Employee $employee)
    {
        $request->validate([
            'profile_picture' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('profile_picture')){
            $filename = $request->profile_picture->getClientOriginalName();

            Storage::disk('public')->put('employee/'.$filename, File::get($request->profile_picture));

            $employee->update(['profile_picture'=>$filename]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Successfully upload employee image',
            'data' => $employee,
        ]);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_hired' => $request->date_hired,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully update employee '.$employee->first_name,
            'data' => $employee,
        ]);
    }

    public function show(Employee $employee)
    {
        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch data employee '.$employee->first_name,
            // 'data' => $employee->with('country', 'department')->get(),
            'data' => $employee,
        ]);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully delete data employee ',
        ]);
    }

    public function assignDepartment(Employee $employee, Request $request)
    {
        $employee->update([
            'department_id' => $request->department_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully assign employee to '.$employee->department->name,
            'data' => $employee
        ]);
    }

    public function assignRole(Employee $employee, Request $request)
    {
        $role = Role::where('name', $request->role)->first();
        $employee->assignRole($role);

        return response()->json([
            'status' => true,
            'message' => 'Successfully assign employee to role'.$role,
            'data' => $employee
        ]);
    }
}
