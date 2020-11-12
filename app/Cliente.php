<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_nascimento',
        'cep',
        'endereco',
        'bairro',
        'ponto_referencia'
    ];
}
