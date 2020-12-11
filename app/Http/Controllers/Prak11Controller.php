<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\produks;

class Prak11Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan daftar Data dari tabel produk
        $KData = produks::get();
        $JRek = produks::count();
        return view('praktikum11.index',compact('KData','JRek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan form untuk Input data produk view create
        //membaca data kategori
        $KData = kategori::get();
        return view('praktikum11.create',compact('KData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //memproses data baru dari form create
        $msg = [
            'required' => 'wajib diisi',
            'numeric' => 'di isi dengan data Number'
        ];
        $aturan= [
            'txProduk' => 'required',
            'txHrgBeli' => 'required|numeric',
            'txHrgJual' => 'required|numeric',
            'txQTY' => 'required|numeric',
            'txKategori' => 'required|numeric',
        ];
        $this->validate($request,$aturan,$msg);

        produks::create([
            'namaproduk'=> $request->txProduk,
            'harga_beli'=>$request->txHrgBeli,
            'harga_jual'=> $request->txHrgJual,
            'qty'=>$request->txQTY,
            'id_kat'=> $request->txKategori,
        ]);

        return redirect()->route('prak11.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan data berdasarkan pencarian namaproduk dalam $id
        $kreteria = "%".$id."%";
        $KData = produks::where("namaproduk",'like',$kreteria)->get();
        $JRek = produks::where("namaproduk",$kreteria)->count();
        return view('praktikum11.index',compact('KData','JRek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
