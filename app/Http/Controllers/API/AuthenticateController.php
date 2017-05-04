<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;
use App\User;

class AuthenticateController extends Controller
{
    /**
     * apply jwt.auth to all methods, except `authenticate`. It use for login
     */
    public function __construct()
    {
        $this->middleware("jwt.auth", ['except' => ["authenticate"]]);
    }

    /**
     * example data. show all users
     * @return 
     */
    public function index()
    {
      $users = User::all();

      return $users;

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
