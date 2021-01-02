<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kategori;
use App\Models\produks;

class Prak11Controller extends Controller
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
        //Perubahan Data Produks berdasarkan kodeID Produk
        //1. mencari data produk yang akan di ubah
        $PData = produks::where("id",$id)->first();
        //2. menampilkan jenis produk
        $KData = kategori::get();

        return view('praktikum11.edit',compact('PData','KData'));
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
        //Menerima Perubahan Data dan menyimpan
        $PData = produks::where("id",$id)->update([
            'namaproduk'=> $request->txProduk,
            'harga_beli'=>$request->txHrgBeli,
            'harga_jual'=> $request->txHrgJual,
            'qty'=>$request->txQTY,
            'id_kat'=> $request->txKategori,
        ]);

        //mengarahkan halaman web ke page index
        return redirect()->route('prak11.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data berdasarkan id
        $PData = produks::where("id",$id)->delete();

        //mengarahkan halaman web ke page index
        //return redirect()->route('prak11.index');
        echo "Penghapusan data Sukses";
    }
}
