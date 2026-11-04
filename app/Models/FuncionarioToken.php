<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionarioToken extends Model
{
    protected $table = 'funcionario_token';

    protected $fillable = [
        'funcionario_id',
        'token',
        'valido_ate',
    ];
}
