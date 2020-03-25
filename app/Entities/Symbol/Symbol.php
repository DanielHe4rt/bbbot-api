<?php


namespace App\Entities;


use App\Entities\Symbol\Data;
use Illuminate\Database\Eloquent\Model;

class Symbol extends Model
{
    protected $fillable = [
        'name'
    ];

    public function data()
    {
        return $this->hasMany(Data::class);
    }
}
