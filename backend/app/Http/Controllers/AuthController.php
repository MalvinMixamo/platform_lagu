<?php

namespace App\Http\Controllers;

use App\Jenis_Kelamin;
use App\Kewarganegaraan;
use App\Models\User;
use App\Perkawinan;
use App\Role;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class AuthController extends Controller
{
    public function Register(Request $request){
        $validation = $request->validate([
            'nik'=>'integer|required|digits:16||unique:user',
            'nama'=>'string|required',
            'email'=>'unique:user|email|required',
            'password'=>'string|required|min:8',
            'tanggal_lahir'=>'date:YYYY-MM-DD|before_or_equal:today',
            'alamat'=>'string|required',
            'rt_rw'=>'string|required',
            'kel_desa'=>'string|required',
            'kecamatan'=>'string|required',
            'jenis_kelamin'=>['required', new Enum(Jenis_Kelamin::class)],
            'perkawinan'=>['required', new Enum(Perkawinan::class)],
            'kewarganegaraan'=>['required', new Enum(Kewarganegaraan::class)],
            'role'=>['required', new Enum(Role::class)]
        ]);

        $user = User::create([
            'nik'             =>$validation['nik'],
            'nama'            =>$validation['nama'],
            'email'           =>$validation['email'],
            'password'        =>Hash::make($validation['password']),
            'tanggal_lahir'   =>$validation['tanggal_lahir'],
            'alamat'          =>$validation['alamat'],
            'rt_rw'           =>$validation['rt_rw'],
            'kel_desa'        =>$validation['kel_desa'],
            'kecamatan'       =>$validation['kecamatan'],
            'jenis_kelamin'   =>$validation['jenis_kelamin'],
            'perkawinan'      =>$validation['perkawinan'],
            'kewarganegaraan' =>$validation['kewarganegaraan'],
            'role'            =>$validation['role']
        ]);

        $token = $user->createToken('akses_token')->plainTextToken;

        return response()->json([
            'message'=> 'Data berhasil dibuat',
            'User' => $user,
        ]);
    }
    public function Login(Request $request){
        $validation = $request->validate([
            'email'=>'email|required',
            'password'=>'string|required',
        ]);

        $user = User::where('email', $validation['email'])->first();

        $token = $user->createToken('Akses_token')->plainTextToken;
        if (!$user || !Hash::check($validation['password'], $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah.'
            ], 401);
        }
        return response()->json([
            "message"=>'Berhasil Login',
            "user"=>$user,
            "token"=> $token
        ], 200);
    }
    public function Logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json([
            "message"=>"berhasil logout"
        ]);
    }
}
