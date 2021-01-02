<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//menggunakan model kategori dan produks
use App\Models\kategori;
use App\Models\produks;
class Prak14Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/prak11');
    }
    /**
     * Menampilkan Graph dari Jumlah stok produk per kategori.
     *
     * @return \Illuminate\Http\Response
     */
    public function ChartProdperKat(){
        $Kgrp = kategori::get();
        $rl = array("role"=>"Blue");
        $a = array("Element", "TotProd",$rl);
        $dta = array($a);

        foreach ($Kgrp as $i => $v) {
            $prd = produks::where('id_kat',$v->idkat)->get();
            $jml = 0;
            foreach ($prd as $ix => $vx){
                $jml += $vx->qty;
            }
            array_push($dta,array($v->kategori,$jml,"yellow"));
        }
        return view('praktikum14.graph')
            ->with('JNS',"BAR")
            ->with('JUDULGRAFIK',"Total Produk per kategori")
            ->with('DTA',json_encode($dta));
    }
    /**
     * Menampilkan Graph dari Jumlah stok produk per kategori.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ChartKategori($id){
        $Kgrp = produks::where('id_kat',$id)->get();
        $rl = array("role"=>"Blue");
        $a = array("Element", "TotProd");
        $dta = array($a);
        
        foreach ($Kgrp as $i => $v) {
                $jml = $v->qty;
                array_push($dta,array($v->namaproduk,$jml));
        }
        return view('praktikum14.graph')
            ->with('JNS',"PIE")
            ->with('JUDULGRAFIK',"Produk of kategori")
            ->with('DTA',json_encode($dta));
        
    }
}
