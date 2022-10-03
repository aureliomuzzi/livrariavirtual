<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;

class Autores extends Model
{
    use HasFactory;
    public $table = 'autores';

    protected $fillable = [
        'firstName',
        'lastName',
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}


