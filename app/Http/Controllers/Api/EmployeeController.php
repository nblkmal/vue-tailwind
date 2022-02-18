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
        $employees = Employee::with('country', 'state', 'city')->get();
        
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
            'data' => $employee->with('country')->first(),
        ]);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully delete data employee ',
            // 'data' => $employee,
        ]);
    }
}
