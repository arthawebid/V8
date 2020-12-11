@extends('praktikum')
@section('JUDULPAGE','Penambahan data stok Produk')
@section('KONTEN')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('prak11.index')}}">produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Penambahan Produk</li>
  </ol>
</nav>
<h3>Penambahan data Produk</h3>

<div class="container-fluid">
<form class="row g-3" method="POST" action="{{route('prak11.store')}}">
{{csrf_field()}}
<input type="hidden" name="_method" value="POST">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
  <input type="text" name="txProduk" class="form-control" value="{{old('txProduk')}}">
  @if($errors->has("txProduk"))
  <span class="badge bg-danger">{{ $errors->first('txProduk') }}</span>
  @endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Harga Beli</label>
  <input type="text" name="txHrgBeli" class="form-control" value="{{old('txHrgBeli')}}">
  @if($errors->has('txHrgBeli'))
  <span class='badge bg-danger'>{{$errors->first('txHrgBeli')}}</span>
  @endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Harga jual</label>
  <input type="text" name="txHrgJual" class="form-control" value="{{old('txHrgJual')}}">
  @if($errors->has('txHrgJual'))
  <span class='badge bg-danger'>{{$errors->first('txHrgJual')}}</span>
  @endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Jumlah Stok</label>
  <input type="text" name="txQTY" class="form-control" value="{{old('txQTY')}}">
  @if($errors->has('txQTY'))
  <span class='badge bg-danger'>{{$errors->first('txQTY')}}</span>
  @endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Kategori</label>
  <select class="form-select"  name="txKategori">
  @foreach($KData as $i=>$p)
    <option value="{{$p->idkat}}">{{$p->kategori }}</option>
  @endforeach
  </select>
  @if($errors->has('txKategori'))
  <span class='badge bg-danger'>{{$errors->first('txKategori')}}</span>
  @endif
</div>
<button type="submit" class="btn btn-primary">Tambah Data Baru</button>
</form>
</div>
@stop