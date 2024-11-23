<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // validation
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => "validation errors",
                'errors' => $validator->errors(),
                'data' => []
            ]);
        }

        // Cek apakah username ada di database
        $user = User::where('username', $request->username)->first();

        // Jika user tidak ditemukan atau password salah
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'User/Password salah', // Pesan kesalahan
            ],);
        }

        // Jika username dan password benar, generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'oke',
            'data' => [
                'id' => $user->id,
                'nama' => $user->nama,
                'token' => $token
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        // Mendapatkan user yang sedang login dari token yang dikirim
        $user = $request->user();

        if ($user) {
            // Menghapus semua token pengguna (logout dari semua perangkat)
            $user->tokens()->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Logout berhasil',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan atau sudah logout',
            ], 404);
        }
    }
}
