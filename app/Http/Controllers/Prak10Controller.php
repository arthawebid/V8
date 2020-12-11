<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\kategori;
class Prak10Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan data Tabel kategori
        $KData = kategori::get();
        $JRek = kategori::count();
        
        return view('praktikum10.tugas1',compact('KData','JRek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //membuat form untuk menambahkan data baru
        return view('praktikum10.tugas1create');
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
        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        $this->validate($request,[
            'txkat' => 'required'
        ],$messages);

        kategori::create([
            'kategori'=> $request->txkat,
            'keterangan'=>$request->txdesk,
        ]);
        return redirect()->route('prak10.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //membaca data yang akan di edit
        $EDt = kategori::where('idkat',$id)->first();
        return view('praktikum10.tugas1edit', compact('EDt'));
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
        //melakukan pembaharuan data
        kategori::where('idkat',$id)
            ->update(
            [
                'kategori'=> $request->txkat,
                'keterangan'=>$request->txdesk,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus data berdasarkan ID
        kategori::where('idkat',$id)->delete();
        return redirect()->route('prak10.index');        
    }
}
