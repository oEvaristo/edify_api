<?php

namespace App\Http\Controllers;

use App\Models\LivroDb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdifyLivrosController extends Controller
{
    public function gravaLivros(Request $request)
    {
        $livro = DB::table('livros')->select('cod_livro')->where('cod_livro', $request->cod_livro)->count();

        if ($livro == 0) {
            LivroDb::create($request->all());
        }        
    }

    public function listaLivros()
    {
        $livro = DB::table('livros')->orderBy('data_inicio_leitura', 'desc')->get();
        return response()->json($livro, 200);
    }
}
