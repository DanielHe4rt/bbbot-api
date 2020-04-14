<?php


namespace App\Http\Controllers;


use App\Entities\Symbol;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SymbolController extends Controller
{
    public function getSymbol(Request $request, string $symbol){
        $symbol = str_replace(['%20',' '],'-',$symbol);
        $model = Symbol::where('name', $symbol)->first();
        if(!$model){
            Symbol::create(['name' => $symbol]);
            return response()->json(['no existe mas agr existe'],404);
        }
        $response = $model->data()->get();
        return response()->json($response);
    }
}
