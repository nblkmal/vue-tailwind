<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(Request $request)
    {
        dd($request);
        return back();
    }
}
