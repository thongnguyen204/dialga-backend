<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name'  => $request->name,
            'password'  => Hash::make($request->password)
        ]);

        if($user)
            Mail::to($request->email)->send(new Welcome());

        return response()->json([
            'name'  => $request->name,
            'access_token' => $user->createToken('authToken')
                ->plainTextToken,
        ], 200);
    }
}
