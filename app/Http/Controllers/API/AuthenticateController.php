<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

class AuthenticateController extends Controller
{
    public function index()
    {

    }

    public function authenticate(Request $request)
    {
        $creds = $request->only("email", "password");

        try {
            //verify creds are created for the user
            if (!$token = JWTAuth::attempt($creds)) {
                return response()->json([
                    "error" => "invalid credentials",
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json(["error" => "could_not_create_token"], 500);
        }
        return response()->json(compact("token"));
    }
}
