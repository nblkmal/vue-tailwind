<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index(State $state)
    {        
        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch cities index',
            'data' => $state->cities,
        ]);
    }
}
