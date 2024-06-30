<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Autor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Autor::create($request->all())){
            return response()->json([
                'message' => 'Autor cadastrada com sucesso!'
            ], 201);
        };

        return response()->json([
            'message' => 'Erro ao cadastrar autor!'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($autor)
    {
        $autor = Autor::find($autor);
        if($autor){
            $response = [
                'autors' => $autor,
                'livros' => $autor->livros
            ];
            return $response;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar autor!'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $autor)
    {
        $autor = Autor::find($autor);

        if($autor){
            $autor->update($request->all());
            return $autor;
        ;}

        return response()->json([
            'message' => 'Erro ao atualizar autor!'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($autor)
    {
        if(Autor::destroy($autor)){
            return response()->json([
                'message' => 'Autor deletado com sucesso'
            ], 201);
        };

        return response()->json([
            'message' => 'Erro ao deletar autor!'
        ],404);
    }
    public function consultaAutor() {
        $consulta = DB::table('autors')->get();
        return $consulta;
    }
}
