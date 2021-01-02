@extends('praktikum')
@section('JUDULPAGE','Penambahan data stok Produk')
@section('KONTEN')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('prak10.index')}}">produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Penambahan Produk</li>
  </ol>
</nav>
        <h2>Data kategori </h2>

        Jumlah Data : {{ $JRek }}
        <a class="btn btn-success" href="http://localhost:8000/prak10/create">Tambah Data</a>
        <table  class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Kategori</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($KData as $i=>$p)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$p->idkat}}</td>
                <td>{{$p->kategori}}</td>
                <th>{{$p->keterangan}}</td>
                <td>
                <a href="http://localhost:8000/prak10/{{$p->idkat}}/edit">Ubah</a>
                <a href="{{route('prak14.perkategori',$p->idkat)}}">Graph</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
@endsection