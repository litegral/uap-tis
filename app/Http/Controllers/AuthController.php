<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|string|unique:mahasiswas',
            'nama' => 'required|string',
            'angkatan' => 'required|integer',
            'password' => 'required|string|min:6',
            'prodi_id' => 'required|integer|exists:prodis,id'
        ]);

        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'password' => Hash::make($request->password),
            'prodi_id' => $request->prodi_id,
        ]);

        return response()->json(['message' => 'Registration successful', 'mahasiswa' => $mahasiswa], 201);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['nim', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => Auth::user()
        ]);
    }
} 