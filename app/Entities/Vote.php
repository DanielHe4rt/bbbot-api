<?php


namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'id','image','ip','success','data'
    ];

    protected $casts = [
        'data' => 'json',
        'success' => 'boolean'
    ];
}

