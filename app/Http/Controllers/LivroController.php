<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Livro::create($request->all())){
            return response()->json([
                'message' => 'Livro cadastrada com sucesso!'
            ], 201);
        };

        return response()->json([
            'message' => 'Erro ao cadastrar livro!'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($livro)
    {
        $livro = Livro::find($livro);
        if($livro){
            return $livro;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar livro!'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $livro)
    {
        $livro = Livro::find($livro);

        if($livro){
            $livro->update($request->all());
            return $livro;
        ;}

        return response()->json([
            'message' => 'Erro ao atualizar livro!'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($livro)
    {
        if(Livro::destroy($livro)){
            return response()->json([
                'message' => 'Livro deletado com sucesso'
            ], 201);
        };

        return response()->json([
            'message' => 'Erro ao deletar livro!'
        ],404);
    }
    public function consultaLivro() {
        $consulta = DB::table('livros')
                    ->join('autors', 'livros.id_autor', '=', 'autors.id')
                    ->select('livros.*', 'autors.nome as nome')
                    ->get();

        return $consulta;
    }
}

