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
  
  <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">            
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1><span>MAOK</span></h1>
                  <h2>Marketplace Oleh-oleh Khas Ketapang</h2>
                  <p>
                    Sebuah marketplace yang dibuat untuk mempermudah para UMKM oleh-oleh khas
                    Ketapang untuk menjual produknya. Marketplace ini dibuat oleh putra daerah.
                  </p>
                   
                    @if(Auth::check())  
                  @else
                      <button type="button" class="btn btn-default get"><a href="{{url('login')}}" style="color: #fff;"> Silahkan Login</a></button>
                  @endif
                </div>
                <div class="col-sm-6">
                  <img src="{{url('public')}}/Client/images/home/Logo MAOK.png" alt="" style="width: 300px; float: right; margin-top: 100px;" />
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/slider-->
  
  <section>
    <div class="container">
      <div class="row">
        @include('Pembeli.Guest.template.sidebar')
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            @foreach($list_produk as $produk)
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img style="width: 100%; height: 180px;" src="{{url("public/$produk->foto")}}" class="img-fluid">
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
          </div><!--features_items-->
          
          
        </div>
      </div>
    </div>
  </section>
  
  @include('Pembeli.template.footer')
  

  
  @include('Pembeli.template.js')
</body>
</html>