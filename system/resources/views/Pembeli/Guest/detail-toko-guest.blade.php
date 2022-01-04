<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Marketplace Oleh-oleh Khas Ketapang</title>
    @include('Pembeli.template.css')
</head><!--/head-->

<body>
  @include('Pembeli.Guest.template.header')
  <section>
    <div class="container">
      <div class="row">
        @include('Pembeli.Guest.template.sidebar')
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Detail Toko</h2>
                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-3">
                      <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                          <div class="card-body box-profile">
                                <img src="{{url("public/$user->foto")}}" class="img-fluid" style="width: 100%; height: 180px; border-radius: 50%;">
                            </div>

                            <h3 class="profile-username">{{$user->nama}}</h3>

                            <p class="text-muted">{{$user->email}}</p>
                          </div>

                          <!-- /.card-body -->
                      </div>
                      <div class="col-md-9" style="background-color: #DCDCDC; border-radius: 5%;">
                        <div class="card-header" style="margin-top: 10px;">
                          <h2 class="title text-center">Produk</h2>
                        </div>
                        @foreach($list_produk as $produk)
                          <div class="col-sm-4">
                            <div class="product-image-wrapper">
                              <div class="single-products">
                                  <div class="productinfo text-center">
                                    <img style="width: 100%; height: 150px;" src="{{url("public/$produk->foto")}}" class="img-fluid">
                                    <h2>Rp. {{number_format($produk->harga)}}</h2>
                                    <p><b>{{$produk->nama}}</b></p>
                                  </div>
                              <div class="product-overlay">
                            <div class="overlay-content">
                              <h2>Rp. {{number_format($produk->harga)}}</h2>
                              <p><b>{{$produk->nama}}</b></p>
                              <a href="{{url('maok/produk', $produk->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cek Disini</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      @endforeach
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--features_items-->  
        </div>
      </div>
    </div>
  </section>
  
  @include('Pembeli.template.footer')
  

  
  @include('Pembeli.template.js')
</body>
</html>