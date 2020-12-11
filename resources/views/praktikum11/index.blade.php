@extends('praktikum')
@section('JUDULPAGE','Daftar Stok Produk')
@section('KONTEN')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">produk</li>
  </ol>
</nav>

<h3>Daftar Produk</h3>
<sup>Total data: {{$JRek}} record</sup>
<div class="container">
<a class="btn btn-success" href="{{route('prak11.create')}}">Tambah Data</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produk</th>
      <th scope="col">IDKategori</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Stok</th>  
    </tr>
  </thead>
  <tbody>
    @foreach($KData as $i=>$p)
    <tr>
      <th scope="row">{{$i+1}}</th>
      <td><a href="{{route('prak11.edit',$p->id)}}">{{$p->namaproduk}}</a></td>
      <td>{{$p->id_kat}}</td>
      <td align="right">{{$p->harga_jual}}</td>
      <td align="right">{{$p->harga_beli}}</td>
      <td align="right">{{$p->qty}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop