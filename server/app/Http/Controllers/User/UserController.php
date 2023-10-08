<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class UserController extends Controller
{
     
    use GeneralTrait;

    
    // >>>>>>>>>>>>>> REGISTER <<<<<<<<<<<<<<<
    public function register(RegisterRequest $request)
    {
        // VALIDATION
        $credentials = $request->validated();

        // CREATE USER 
        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);

        // CREATE TOKEN
        $token = $user->createToken('main')->plainTextToken;

        return $this->returnData('User register successfully', compact('user', 'token'));
    }



    // >>>>>>>>>>>>>> LOGIN <<<<<<<<<<<<<<<
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        
        // CHECK USER
        if(!Auth::attempt($credentials)){
            return response([
                'message' => 'Invalid email or password'
            ], 422);
        }
        // CHECK AUTHORISATION
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return $this->returnData('Login Successfully', compact('user', 'token'));
        
    }



    // >>>>>>>>>>>>>> LOGOUT <<<<<<<<<<<<<<<
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response(['msg' => 'Logout Successfully'], 204);
    }



    // >>>>>>>>>>>>>> USER <<<<<<<<<<<<<<<
    public function user(Request $request)
    {
        return $request->user();
    }

    
}
