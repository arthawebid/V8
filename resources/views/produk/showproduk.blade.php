<!DOCTYPE html>
<html>
    <head>
        <title>Latihan View 04</title>
    </head>
    <body>

        @if(count($produk)==1)
            <p>{{ "Jumlah Data adalah Satu" }}</p>
        @elseif(count($produk)>1)
            <p>{{"Jumlah Data lebbih Dari Satu"}}</p>

            @for($i=0;$i<count($produk);$i++)

                <p>No: {{$i}}; Nama produk: {{ $produk[$i] }}</p>

            @endfor

        @else
            <p>Tidak ada Data</p>
        @endif


    </body>
</html>