<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch permissions index',
            'data' => $permissions,
        ]);
    }
}
