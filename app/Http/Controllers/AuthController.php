<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
        $this->middleware('auth:sanctum')
             ->except(['register', 'login']);
    }

    public function register(UserRequest $request) {
        $validated = $request->validated();

        $user = $this->userRepository->createOrUpdate(null, $request->all());

        return response()->json([
            'data' => $user,
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => "Bearer"
        ]);
    }

    public function login(LoginRequest $request) {
        $validated = $request->validated();
        if (!Auth::attempt($validated)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'access_token' => $request->user()->createToken('auth_token')->plainTextToken,
            'token_type' => "Bearer"
        ]);
    }

    public function test_prob() {
        return response()->json([
            "message" => "Esta es una prueba de ruta protegida"
        ]);
    }
}
