<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch roles index',
            'data' => $roles,
        ]);
    }

    public function create(Request $request)
    {
        $role = Role::create([
            'name' => $request->name
        ]);
        
        return response()->json([
            'status' => true,
            'message' => 'Successfully create '.$role.' role',
            'data' => $role,
        ]);
    }

    public function delete(Role $role)
    {
        $role->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Successfully delete role',
        ]);
    }


}
