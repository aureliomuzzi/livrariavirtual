<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiLivro extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-icct';
    }
}