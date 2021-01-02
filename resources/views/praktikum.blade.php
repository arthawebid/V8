<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>@yield('JUDULPAGE')</title>
  </head>
  <body>
    <div class="container-fluid">
        
          <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Toko Hana</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('prak10.index')}}">Kategori</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('prak11.index')}}">Produks</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Graph
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('prak14.ProdukperKategori')}}">Kategori</a></li>
                      <li><a class="dropdown-item" href="{{route('prak14.ProdukperKategori')}}">ProdukPerKategori</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('prak11.logout')}}">Logout</a>
                  </li>
                </ul>
                <form class="d-flex" method="GET">
                <input class="form-control me-2" id="cx" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" id="caridata" type="button">Search</button>
                </form>
                </div>
              </div>
            </div>
          </nav>

          <div class="container-fluid">
            @yield('KONTEN')
          <div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        //Script untuk Cari data
        $("#caridata").click(function(e){
            var idJDWL = "{{route('prak11.index')}}/"+$("#cx").val();
            window.location.href = idJDWL;
        });
        //Script untuk kembali dari form edit ke list data
        $("#kembali").click(function(e){
            var idJDWL = "{{route('prak11.index')}}";
            window.location.href = idJDWL;
        });
        //Script untuk hapus data
        $("#hapusdata").click(function(e){
          e.preventDefault();
            var id = $("#txid").val();
            var produk = $("#txProduk").val();
            var idJDWL = "{{route('prak11.index')}}/"+id;
            var TOKEK = $('#frmeditdata').find('input[name="_token"]').val();
            bootbox.dialog({
              message: "Yakin akan menghapus data dengan ID: "+id+"<br>Nama Produk: "+produk+" ?",
              title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
              buttons: {
                success: {
                  label: "Batal",
                  className: "btn-success",
                  callback: function() {
                    $('.bootbox').modal('hide');
                  }
                },
                danger: {
                  label: "Hapus!",
                  className: "btn-danger",
                  callback: function() {
                    $.ajax({
                      type: 'DELETE',
                      url: idJDWL,
                      data: '_method=DELETE&_token='+TOKEK,

                    })
                    .done(function(response){
                      var idJDWL = "{{route('prak11.index')}}";
                      bootbox.alert("response");
                      window.location.href = idJDWL;
                      parent.fadeOut('slow');
                      
                    })
                    .fail(function(){
                      bootbox.alert('Error....');
                    })
                  }
                }

              }
            }); 
        });
    });
</script>
  </body>
</html>
