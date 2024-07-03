<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use Illuminate\Http\Request;

class ImagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return
        $imagens = Imagem::all()->toArray();

    return $imagens;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        if (Imagem::create($request->all())){
            return response()->json([
                'message' => 'imagem cadastrada com sucesso!'
            ], 201);
        };

        return response()->json([
            'message' => 'Erro ao cadastrar imagem!'
        ], 404);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($imagem)
    {
        $imagem = Imagem::find($imagem);
        if($imagem){

            return $imagem;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar imagem!'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
