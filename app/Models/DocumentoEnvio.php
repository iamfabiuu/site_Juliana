<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoEnvio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_cliente',
        'email_cliente',
        'mensagem_email',
        'planilha_path',
        'identificador_publico',
        'tipo_envio', // 'resultado' ou 'material_diverso'
        'assunto_email',
    ];

    public function curriculos()
    {
        return $this->hasMany(DocumentoCurriculo::class, 'documento_envio_id');
    }
}
