<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
