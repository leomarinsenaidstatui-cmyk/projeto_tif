<?php

namespace App\Http\Controllers;

use App\Models\TokenUsuario;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function login_api(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
        ]);

        $usuario = Usuario::where('email', $credentials['email'])->first();

        if (! $usuario || ! Hash::check($credentials['senha'], $usuario->senha)) {
            return response()->json([
                'erro' => 's',
                'mensagem' => 'Email ou senha incorretos.',
            ], 401);
        }

        TokenUsuario::where('usuario_id', $usuario->id)->delete();

        $token = TokenUsuario::create([
            'usuario_id' => $usuario->id,
            'valido_ate' => now()->addDays(3),
            'token' => Str::random(80),
        ]);

        return response()->json([
            'erro' => 'n',
            'mensagem' => 'Login realizado com sucesso.',
            'token' => $token->token,
        ]);
    }
}
