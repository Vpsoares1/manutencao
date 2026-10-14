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

    public function status_manutencao()
    {
        return $this->belongsTo(StatusManutencao::class, 'status_manutencao_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }
    
    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }
    
    public function bloco()
    {
        return $this->belongsTo(Bloco::class, 'bloco_id');
    }

}
