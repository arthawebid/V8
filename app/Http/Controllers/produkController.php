<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produkController extends Controller
{
    //Property untuk Index
    public function index(){
        $produk = "Sepatu JN 325";
        return view('produk/index',compact('produk'));
    }
    //property showproduk
    public function showproduk(){
        $produk = ["Sepatu JN 325","Minuman Bersoda","Buku Sejarah","Mouse Pad"];
        return view('produk.showproduk',compact('produk'));
    }
}
