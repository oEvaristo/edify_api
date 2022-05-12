<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroDb extends Model
{
    use HasFactory;

    protected $table = 'livros';
    protected $fillable = [        
        'cod_livro',
        'nome',
        'autor',
        'paginas',
        'imagem',
        'data_inicio_leitura',
        'data_fim_leitura',
        'avaliacao',
        'resenha'
    ];
    public $timestamps = false;
}
