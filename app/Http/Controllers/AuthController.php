<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_card_number' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors()
            ], 422);
        }

        $auth = Auth::guard('society')->attempt($request->only(['id_card_number', 'password']));
        if (!$auth) {
            return response()->json([
                'message' => 'ID Card Number or Password incorrect'
            ], 401);
        }

        $user = Auth::guard('society')->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "name" => $user->name,
            "born_date" => $user->born_date,
            "gender" => $user->gender,
            "address" => $user->address,
            "token" => $token,
            'regional' => $user->regional
        ], 200);
    }
}
