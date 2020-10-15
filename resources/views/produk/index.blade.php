<!DOCTYPE html>
<html>
    <head>
        <title>Latihan View 02</title>
    </head>
    <body>
        <h2>isi variabel Produk:</h2>

        Produk: {{ isset($produk)? $produk : "Variabel Produk Tidak ada"}}

    </body>
</html>