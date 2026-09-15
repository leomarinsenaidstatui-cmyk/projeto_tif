<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'local';

    protected $fillable = [
        'nome',
        'setor',
        'descricao',
        'tipo',
        'status',
    ];
}
