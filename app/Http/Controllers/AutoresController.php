<?php

namespace App\Http\Controllers;

use App\Models\Autores;
use Illuminate\Http\Request;
use App\DataTables\AutoresDataTable;
use App\Services\Livros;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AutoresDataTable $dataTable)
    {
        Livros::getAutores();
        return $dataTable->render('autor.list');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autor.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
        ];

        Autores::create($dados);

        return redirect('/autor')->with('mensagem', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function show(Autores $autores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function edit(Autores $autor)
    {
        return view('autor.form', [
            'autor' => $autor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autores $autor)
    {
        $dados = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
        ];

        $autor->update($dados);

        return redirect('/autor')->with('mensagem', 'Registro criado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autores  $autores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autores::find($id);
        $autor->delete();
        return redirect('/autor')->with('mensagem', 'Registro excluído com sucesso!');
    }
}
