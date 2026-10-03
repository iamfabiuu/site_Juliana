<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoCurriculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'documento_envio_id',
        'nome_curriculo',
        'arquivo_path',
        'tipo'
    ];

    public function envio()
    {
        return $this->belongsTo(DocumentoEnvio::class, 'documento_envio_id');
    }
}
