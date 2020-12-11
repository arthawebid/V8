<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class Prak9Controller extends Controller
{
    //Menampilkan Jumlah total data Record
    public function QB_tugas1(){
        $JRekProduk = DB::table('produks')->count();
        $JRekkategori = DB::table('kategori')->count();

        return view('praktikum9.tugas1',compact('JRekProduk','JRekkategori'));
    }

    public function QB_tugas2(){
        $id_kat = 4;
        $PData = DB::table('produks')
            ->where('id_kat',$id_kat)
            ->get();
        $JRek = DB::table('produks')
            ->where('id_kat',$id_kat)
            ->count();

        return view('praktikum9.tugas2',compact('id_kat','PData','JRek') );
    }

    public function QB_tugas3(){
        $PData = DB::table('produks')
            ->join('kategori','produks.id_kat','=','kategori.idkat')
            ->get();

        $JRek1 = DB::table('produks')
            ->join('kategori','produks.id_kat','=','kategori.idkat')
            ->count();
        
        return view('praktikum9.tugas3',compact('JRek1','PData'));
    }
    // bertanya NIM: 19101227
}
