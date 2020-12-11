<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data Kategori ~ Latihan Praktikum 10</title>
    </head>
    <body>
        <h2>Edit Data kategori ID: {{$EDt->idkat}} </h2>
        <form method="POST" action="/prak10">
        @csrf()
        @method('POST')
            <div class="txlabel">kategori*</div>
            <div class="inputext">
                <input type="text" name="txkat" value="{{ $EDt->kategori  }}">
            </div>
            <div class="txlabel">Deskripsi</div>
            <div class="inputext">
                <input type="text" name="txdesk" value="{{ $EDt->keterangan }}">
            </div>
            <div class="tombol">
                <input type="submit" class="btn" name="btnkirim" value=" Simpan Data ">
            </div>
            <div class="catatan">
                * harus diisi
            </div>
        </form>
        <br>
        <form method="POST" action="/prak10/{{ $EDt->idkat }}">
        @csrf()
        @method('DELETE')
        <div class="tombol">
                <input type="submit" class="btn" name="btnkirim" value=" Hapus Data ">
            </div>
        </form>
    </body>
</html>