@extends('praktikum')
@section('JUDULPAGE','Perubahan dan Penghapusan data stok Produk')
@section('KONTEN')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('prak11.index')}}">produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Perubahan dan penghapusan data Produk</li>
  </ol>
</nav>
<h3>Penambahan data Produk</h3>

<div class="container-fluid">
<form class="row g-3" method="POST" id="frmeditdata" action="{{route('prak11.update',$PData->id)}}">
{{csrf_field()}}
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="txid" id="txid" value="{{$PData->id}}">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
  <input type="text" name="txProduk" id="txProduk" class="form-control" value="{{$PData->namaproduk}}">
  @if($errors->has("txProduk"))
  <span class="badge bg-danger">{{ $errors->first('txProduk') }}</span>
  @endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Harga Beli</label>
  <input type="text" name="txHrgBeli" class="form-control" value="{{$PData->harga_beli}}">
  @if($errors->has('txHrgBeli'))
  <span class='badge bg-danger'>{{$errors->first('txHrgBeli')}}</span>
  @endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Harga jual</label>
  <input type="text" name="txHrgJual" class="form-control" value="{{$PData->harga_jual}}">
  @if($errors->has('txHrgJual'))
  <span class='badge bg-danger'>{{$errors->first('txHrgJual')}}</span>
  @endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Jumlah Stok</label>
  <input type="text" name="txQTY" class="form-control" value="{{$PData->qty}}">
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
<div class="container">

    <div class="row justify-content-around">
        <div class="col-4">
            <button type="submit" class="btn btn-primary">Ubah Data Baru</button>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-danger" id="hapusdata">Hapus Data</button>
        </div>
        <div class="col-4">
            <button type="button" id="kembali" class="btn btn-success">Kembali ke List Data</button>
        </div>
    </div>

</div>
</form>
</div>

@stop