<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='categories';
    protected $fillable = ['name', 'show_on_nav','show_on_side' ];
}
