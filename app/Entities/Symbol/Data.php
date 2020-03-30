<?php


namespace App\Entities\Symbol;


use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = "symbol_data";

    protected $fillable = [
        'symbol_id','width','height', 'grey', 'black', 'white'
    ];

    protected $hidden = [
        'created_at','updated_at','symbol_id','id'
    ];
}
