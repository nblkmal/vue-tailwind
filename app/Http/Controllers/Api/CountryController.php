<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Successfully fetch countries index',
            'data' => $countries,
        ]);
    }
}
