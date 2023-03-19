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

    public function updateUserLocation(Request $request) {
        $user = User::find($request->user()->id);
        $user->location = DB::raw("POINT($request->longitude, $request->latitude)");
        $user->save();
        return response()->json($user);
    }

    public function searchUsersByName(Request $request) {
        $users = User::where('name', 'like', '%' . $request->name . '%')->limit(10)->get();
        //remove self from the results
        $users = $users->filter(function ($user) use ($request) {
            return $user->id != $request->user()->id;
        });
        return response()->json($users);
    }

    //test
    // public function setUserWeight($id, $weight) {
    //     // echo "test setUserWeight" . $id . " and " . $weight;
    //     DB::update('UPDATE users SET weight = ? WHERE id = ?', [$weight, $id]);
    //     // register endpoint
    //     return "test::UserID:: " . $id . " Weight:: " . $weight;
    //     // return $id;//$result;
    // }

    // public function setUserHeight($id, $height) {
    //     // echo "test setUserHeight" . $id . " and " . $height;
    //     DB::update('UPDATE users SET height = ? WHERE id = ?', [$height, $id]);
    //     // // register endpoint
    //     // return "test setUserHeight" . $id . " and " . $height;
    //     return "test::UserID:: " . $id . ", Height:: " . $height;
    // }
    public function putUserWeightAndHeight(Request $request, $weight, $height) {
        // echo "test setUserWeight" . $id . " and " . $weight;
        DB::update('UPDATE users SET weight = ?, height = ? WHERE id = ?', 
            [$weight, $height, $request->user()->id]);

        return "test::UserID:: " . $request->user()->id . " Weight:: " . $weight. " Height:: " . $height;
        // return $id;//$result;
    }
    // public function putTest(Request $request, $id, $height) {
    //     return $id . " and " . $height;
    // }
    //
}
