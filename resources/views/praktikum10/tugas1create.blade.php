@extends('praktikum')
@section('JUDULPAGE','Penambahan data stok Produk')
@section('KONTEN')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('prak10.index')}}">produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Penambahan Produk</li>
  </ol>
</nav>
        <h2>Menambahkan Data kategori </h2>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="/prak10">
        @csrf()
        @method('POST')
            <div class="txlabel">kategori*</div>
            <div class="inputext">
                <input type="text" name="txkat"> @if($errors->has("txkat")) <span clas="err">Masih Kosong</span> @endif
            </div>
            <div class="txlabel">Deskripsi</div>
            <div class="inputext">
                <input type="text" name="txdesk">
            </div>
            <div class="tombol">
                <input type="submit" class="btn" name="btnkirim" value=" Buat Baru ">
            </div>
            <div class="catatan">
                * harus diisi
            </div>
        </form>
@endsection