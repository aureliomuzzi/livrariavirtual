<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autores;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'autor_id',
        'title',
        'isbn'
    ];

    public function autor()
    {
        return $this->belongsTo(Autores::class);
    }
}
