<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){
        $products = Film::all();

        return response(['data' => $products]);
    }

    public function show($id)
    {
        $products = Film::find($id);
        if (!$products) {
            throw new ApiException(404, 'Товар не найден');
        }
        return response(['data' => $products]);
    }
}
