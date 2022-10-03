<?php

namespace App\Http\Controllers;

use App\Facades\ApiLivro;

class ApiController extends Controller
{
    public function __invoke()
    {
        return ApiLivro::get('/authors'. config('app.api_access_token'));
    }
}