<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index(Country $country)
    {
        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch states index',
            'data' => $country->states,
        ]);
    }
}
