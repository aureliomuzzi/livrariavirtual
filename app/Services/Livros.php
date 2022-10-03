<?php

namespace App\Services;

use App\Facades\ApiLivro;
use App\Models\Autores;
use App\Models\Livro;

class Livros
{
    public static function getAutores()
    {
        $autores = ApiLivro::get('/authors'. config('app.api_access_token'));
        $autores = $autores->json();

        foreach ($autores as $autor) {
            Autores::firstOrCreate([
                'firstName' => $autor['firstName'],
                'lastName' => $autor['lastName']
            ]);
        }
    }

    public static function getLivros()
    {
        $livros = ApiLivro::get('/books'. config('app.api_access_token'));
        $livros = $livros->json();

        foreach ($livros as $livro) {
            Livro::firstOrCreate([
                'title' => $livro['title'],
            ]);
        }
    }
}
