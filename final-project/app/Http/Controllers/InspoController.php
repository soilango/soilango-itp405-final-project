<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Http;

class InspoController extends Controller
{
    public function index()
    {
        // GET https://api.spoonacular.com/recipes/complexSearch?apiKey=[API_KEY]&diet=vegetarian&addRecipeInformation=true

        $queryString = http_build_query([
            'diet' => 'vegetarian',
            'addRecipeInformation' => 'true',
            'number' => '50',
        ]);


        $response = Http::get("https://api.spoonacular.com/recipes/complexSearch?apiKey=" . env('SPOONACULAR_API_KEY') . "&$queryString");


        return view('inspo/index', [
            'user' => Auth::user(),
            'response' => $response->object(),
        ]);
    }
}
