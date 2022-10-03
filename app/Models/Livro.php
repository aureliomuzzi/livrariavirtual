<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autores;

class Livro extends Model
{
    use HasFactory;

    public function autores()
    {
        return $this->belongsTo(Autores::class);
    }
}
