<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $table = 'candidato';
    /*protected $fillable = [
        'user_id', 'is_correios', 'status', 'total_linhas', 'index_atual', 'total_integrado', 
        'log', 'log_final', 'nomeLoja_xlsx', 'token_xlsx', 'secret_key', 'token_melhor_envio', 'caminho_xlsx_original',
        'caminho_xlsx_retorno', 'created_at', 'updated_at', 'deleted_at',
    ]; */ 
    protected $guarded = ['id']; 
}
