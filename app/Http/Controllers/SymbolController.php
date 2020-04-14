<?php


namespace App\Http\Controllers;


use App\Entities\Symbol;
use Illuminate\Http\Request;

class SymbolController extends Controller
{
    public function getSymbol(Request $request, string $symbol){
        $model = Symbol::where('name', $symbol)->first();
        if(!$model){
            $model = Symbol::create(['name' => $symbol]);
            return response()->json(['no existe mas agr existe'],404);
        }
        $response = $model->data()->get();
        return response()->json($response);
    }
}
