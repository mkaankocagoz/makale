<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request)
    {
        try{
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->save();
            return response(['message' => 'User Created Successfully']);
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }
}
