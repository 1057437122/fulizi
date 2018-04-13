<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SpaController extends Controller
{
    //
    public function root(){
    	echo 'root';
    }
    public function index(){
    	$title = env('title','Matrix');
    	return view('spa',['title'=>$title]);
    }
}
