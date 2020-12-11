<!DOCTYPE html>
<html>
    <head>
        <title>List Kategori ~ Latihan Praktikum 10</title>
    </head>
    <body>
        <h2>Data kategori </h2>

        Jumlah Data : {{ $JRek }}
        <a href="http://localhost:8000/prak10/create">Tambah Data</a>
        <table border="1">
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
                <td><a href="http://localhost:8000/prak10/{{$p->idkat}}/edit">Ubah</a></td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </body>
</html>