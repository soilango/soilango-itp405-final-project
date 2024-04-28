<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Http;

class InspoController extends Controller
{
    public function index()
    {
        // GET https://api.spoonacular.com/recipes/complexSearch?apiKey=e61c4d2a41a6470f9915ec2f2a58d75b&diet=vegetarian&addRecipeInformation=true

        $queryString = http_build_query([
            'diet' => 'vegetarian',
            'addRecipeInformation' => 'true',
            'number' => '50',
        ]);

        // dd($queryString);

        $response = Http::get("https://api.spoonacular.com/recipes/complexSearch?apiKey=" . env('SPOONACULAR_API_KEY') . "&$queryString");

        // dd($response->json());

        return view('inspo/index', [
            'user' => Auth::user(),
            'response' => $response->object(),
        ]);
    }
}
