<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitacao_manutencao extends Model
{
    protected $table = 'solicitacao_manutencao';

    protected $fillable = [
        'descricao',
        'status_manutencao_id',
        'usuario_id',
        'funcionario_id',
        'sala_id',
        'bloco_id',
        
    ];
}
