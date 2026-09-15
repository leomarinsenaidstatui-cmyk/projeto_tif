<?php

namespace App\Http\Controllers;

use App\Models\MensagemBoasVindas;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MensagemBoasVindasController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function store(Request $request): JsonResponse
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'mensagem' => ['required', 'string', 'max:500'],
        ], [
            'nome.required' => 'Informe seu nome.',
            'nome.max' => 'O nome deve ter no máximo 100 caracteres.',
            'mensagem.required' => 'Escreva uma mensagem.',
            'mensagem.max' => 'A mensagem deve ter no máximo 500 caracteres.',
        ]);

        $mensagemBoasVindas = MensagemBoasVindas::create($dados);

        return response()->json([
            'erro' => 'n',
            'mensagem' => 'Mensagem cadastrada com sucesso.',
            'dados' => $mensagemBoasVindas,
        ], 201);
    }
}
