<?php


namespace App\Http\Controllers;


use App\Entities\Symbol;
use Illuminate\Http\Request;

class SymbolController extends Controller
{
    public function getSymbol(Request $request, string $symbol){
        $model = Symbol::where('name', $symbol)->first();
        if(!$model){
            return response()->json(['no existe'],404);
        }
        $response = $model->data()->get();
        return response()->json($response);
    }
}
