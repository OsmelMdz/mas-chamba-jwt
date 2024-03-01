<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class UsersController extends Controller
{
    public function loginUsuario(Request $request){
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return redirect()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $user = $request->user();
        $id_rol = $user->id_rol;

        if ($id_rol == 1) {
            $token = $user->createToken('auth_token', ['administrador'])->plainTextToken;
        } else if($id_rol == 2) {
            $token = $user->createToken('auth_token', ['prestador_servicio'])->plainTextToken;
        }
        return response()->json(['token' => $token, 'Usuario' => $user], 200);
    }

    public function getUsuarios(){
        $usuario = User::all();
        return response()->json($usuario, 200);
    }

    public function newUsuario(Request $request){
        $usuario = User::create($request->all());
        return response($usuario, 200);
    }
}
