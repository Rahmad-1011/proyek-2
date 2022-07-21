<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  @include('Pembeli.Pembeli.template.css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


@include('Pembeli.Pembeli.template.header')

<section class="ad-post bg-gray py-5">
    <div class="container">
      <div class="row">
        <h2 style="color: #117A65">Pembayaran Pesanan</h2>
      </div>
        <form action="{{url('konfirmasi-pembayaran', $pesanan->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$pesanan->id}}">
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-3 my-5 shadow">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Produk Dipesan</h3>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-responsive product-dashboard-table">
                              <thead>
                                <tr>
                                  <th> </th>
                                  <th> </th>
                                  <th class="text-center">Harga Satuan</th>
                                  <th class="text-center">Jumlah</th>
                                  <th class="text-center" style="text-align: right">Subtotal Harga Produk</th>
                                  <th class="text-center" style="text-align: right">Jumlah Harga Produk</th>
                                </tr>
                              </thead>
                              <tbody style="text-align: center">
                                @foreach($pesanan_details as $pesanan_detail)
                                <tr>
                                  <td class="product-thumb">
                                    <img width="80px" height="auto" src="{{url('public')}}/{{$pesanan_detail->produk->foto}}" alt="image description">
                                    </td>
                                  <td class="product-details" style="text-align: left;">
                                    <h3 class="title">{{$pesanan_detail->produk->nama}}</h3>
                                    <span class="add-id"><strong>Pembayaran:</strong> via {{$pesanan_detail->pesanan->pembayaran->nama}}</span>
                                    <span><strong>{{$pesanan_detail->pesanan->pembayaran->atas_nama}} / {{$pesanan_detail->pesanan->pembayaran->nomor}}</strong></span><br>
                                    <span class="status active"><strong>Toko : </strong>{{$pesanan_detail->produk->penjual->nama}}</span><br>
                                    <span class="location"><strong>Asal:</strong> {{$pesanan_detail->produk->penjual->alamat}}</span>
                                  </td>
                                  <td class="product-category">
                                    <span class="categories">{{$pesanan_detail->produk->kategori->nama}}</span>
                                  </td>
                                  <td class="action" data-title="Action">
                                    <span>{{$pesanan_detail->jumlah}} pcs</span>
                                  </td>
                                  <td class="action" data-title="Action" style="text-align: center">
                                    <span>Rp.{{number_format($pesanan_detail->produk->harga)}}</span>
                                  </td>
                                  <td class="action" data-title="Action" style="text-align: right">
                                    <span>Rp.{{number_format($pesanan_detail->jumlah_harga)}}</span>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 pt-4">
                          <div class="row">
                            <div class="col-lg-6 col-sm-4">
                            </div>
                            <div class="col-lg-4 col-sm-4" style="text-align: right;">
                              <span style="font-size: 10pt;"> Jumlah Harga Pesanan : </span><br><br>
                              <span style="font-size: 10pt;"> Total Harga Pesanan + Jasa {{$pesanan->kurir->nama}} : </span>
                            </div>
                            <div class="col-lg-2 col-sm-4" style="text-align: right">
                              <span>Rp. {{number_format($pesanan->jumlah_harga)}}</span><br><br>
                              <span style="font-size: 14pt; color: #117A65">Rp. {{number_format($pesanan->jumlah_harga+$pesanan_detail->pesanan->kurir->tarif)}}</span>
                            </div>
                          </div>
                        </div>
                    </div>
            </fieldset>
            <!-- Post Your ad end -->

            <!-- seller-information start -->
            <fieldset class="border p-4 my-3 mb-3 seller-information bg-gray shadow">
                <div class="col-lg-12 pt-2">
                  <div class="row">
                    <div class="col-lg-6 col-sm-6">
                      <h6 class="font-weight-bold pt-2 pb-1">Bukti Pembayaran <span style="font-size: 8pt">(Berupa SS-an Struk, dsb)</span></h6>
                      <img id="output" width="100%" src="{{url('public')}}/$pesanan_detail->pesanan->foto" alt="">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                      <input type="file" id="foto" onchange="readFoto(event)" name="foto" class="form-control" accept="image/*" required>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 pt-2">
                  <div class="row">
                    <div class="col-lg-12 col-sm-12">
                      <button type="submit" class="btn btn-primary" style="border-radius: 10px; float: right; margin-top: 20px;">Pesan Sekarang</button>
                    </div>
                  </div>
                </div>
            </fieldset>
            <!-- seller-information end-->
        </form>
    </div>
</section>
<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')


<!-- JAVASCRIPTS -->
<script type="text/javascript">
    var readFoto= function(event) {
      var input = event.target;
      var reader = new FileReader();
      reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('output');
        output.src = dataURL;
      };
      reader.readAsDataURL(input.files[0]);
    };
  </script>
@include('Pembeli.Pembeli.template.js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        //active select2
        $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan, .kurir").select2({
            theme:'bootstrap4',width:'style',
        });
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/pemesanan/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
            }
        });
        //ajax check ongkir
        let isProcessing = false;
        $('.btn-check').click(function (e) {
            e.preventDefault();

            let token            = $("meta[name='csrf-token']").attr("content");
            let city_origin      = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier          = $('select[name=courier]').val();
            let weight           = $('#weight').val();

            if(isProcessing){
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: "/pemesanan",
                data: {
                    _token:              token,
                    city_origin:         city_origin,
                    city_destination:    city_destination,
                    courier:             courier,
                    weight:              weight,
                },
                dataType: "JSON",
                type: "POST",
                success: function (response) {
                    isProcessing = false;
                    if (response) {
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response[0]['costs'], function (key, value) {
                            $('#ongkir').append('<li class="list-group-item">'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)</li>')
                        });

                    }
                }
            });

        });

    });
</script>

</body>

</html>