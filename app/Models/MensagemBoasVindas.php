<?php

namespace App\Models;

use Database\Factories\MensagemBoasVindasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensagemBoasVindas extends Model
{
    /** @use HasFactory<MensagemBoasVindasFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'mensagem',
    ];
}
