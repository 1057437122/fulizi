<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $fillable = ['name', 'cat_id','detail','show_on_nav','show_on_side' ];
}
