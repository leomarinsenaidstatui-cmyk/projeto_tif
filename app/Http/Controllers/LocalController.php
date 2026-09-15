<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function cadastro_local(Request $request)
    {
        return view('local');

    }

    public function cadastrar_local(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'setor' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $local = new Local;
        try {
            $local->nome = $request->nome;
            $local->setor = $request->setor;
            $local->descricao = $request->descricao;
            $local->tipo = $request->tipo;
            $local->status = $request->status;
            $local->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Local cadastrado com sucesso.'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar local.'], 500);
        }
    }
}
