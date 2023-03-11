<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPersonalInfo(Request $request) {
        $user = User::find($request->user()->id);
        return response()->json($user);
    }

    public function getSimilarUsers(Request $request) {
        // location point should be within 10km and bmi = (weight / height * weight) should be within 5% of the user's bmi
        $weight = $request->user()->weight == 0 ? 70 : $request->user()->weight;
        $height = $request->user()->height == 0 ? 1.7 : $request->user()->height;

        $bmi = $weight / pow($height, 2);
        $bmiMin = $bmi * 0.9;
        $bmiMax = $bmi * 1.1;
        // Let's limit the results to 50 to avoid overloading the server
        $results = DB::select('SELECT id, name, avatar, gender, (weight / (height * height)) as bmi FROM users WHERE ST_Distance_Sphere(location, POINT(?, ?)) < 10000 AND (weight / (height * height)) BETWEEN ? AND ? AND id != ? ORDER BY (gender=?) DESC LIMIT 50', [$request->user()->location->longitude, $request->user()->location->latitude, $bmiMin, $bmiMax, $request->user()->id, $request->user()->gender]);
        
        // return the top 20% of the results
        $results = array_slice($results, 0, count($results) / 5);
        
        return response()->json($results);
    }
}
