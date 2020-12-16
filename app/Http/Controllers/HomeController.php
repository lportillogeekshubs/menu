<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $plates = DB::table('plates')->get();
        // dd($plates);
        foreach ($plates as $plate) {
            $ingredients = DB::table('plates_ingredients')
                ->select('plates_ingredients.quantity', 'ingredients.name')
                ->leftjoin('ingredients', 'plates_ingredients.id_ingredient', '=', 'ingredients.id')
                ->where('plates_ingredients.id_plate', '=', $plate->id)
                ->get();

            $plateIngredients[] = ['plate' => $plate, 'ingredients' => $ingredients];
        }
// dd($plateIngredients); 
        return view('prueba', ['plateIngredients' => $plateIngredients]);
    }
}
