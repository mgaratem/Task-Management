<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function login(Request $request)
    {        
        try {
            $token = Str::random(60);

            $credentials = request(['email', 'password']);

            if (!auth()->attempt($credentials)) {

                return response()->json(['error' => 'The given user data was invalid'], 422); 
            }

            $user = $this->userRepository->findByEmail($request->email);

            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json(['access-token' => $token], 200);

        } catch(\Exception $e){
            return response()->json(['error' => 'An internal error has occurred'], 500);
        }
    }
}
