<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produkController extends Controller
{
    //Property untuk Index
    public function index(){
        $isi = "Ini merupakan isi dari Propery INdex dalam Controller produkController";
        return $isi;
    }
}
