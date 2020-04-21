<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['name', 'paired', 'url', 'counter'];

    //use class attributes for Boolean Logic
    protected $casts = [
        'paired' => 'boolean',
        'counter' => 'boolean',
    ];
    

}



