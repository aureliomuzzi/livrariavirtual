<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autores;
use Illuminate\Http\Request;
use App\DataTables\LivroDataTable;
use App\Services\Livros;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LivroDataTable $dataTable)
    {
        Livros::getLivros();
        return $dataTable->render('livros.list');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autores::selectRaw('id, CONCAT(firstName, " ", lastName) as nomeCompleto')->orderBy('nomeCompleto','asc')->get();
        return view('livros.form', [
            'autores' => $autores->pluck('nomeCompleto', 'id'),
        ]);
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
            'autor_id' => $request->autor_id,
            'title' => $request->title,
            'isbn' => $request->isbn
        ];

        Livro::create($dados);

        return redirect('/livros')->with('mensagem', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        $autores = Autores::selectRaw('id, CONCAT(firstName, " ", lastName) as nomeCompleto')->orderBy('nomeCompleto','asc')->get();
        return view('livros.form', [
            'livro' => $livro,
            'autores' => $autores->pluck('nomeCompleto', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livro $livro)
    {
        $dados = [
            'autor_id' => $request->autor_id,
            'title' => $request->title,
            'isbn' => $request->isbn,
        ];

        $livro->update($dados);

        return redirect('/livros')->with('mensagem', 'Registro criado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livro::find($id);
        $livro->delete();
        return redirect('/livros')->with('mensagem', 'Registro excluído com sucesso!');
    }
}
