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
  @include('Pembeli.template.header')
  <section>
    <div class="container">
      <div class="row">
        @include('Pembeli.template.sidebar')
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Detail Toko</h2>
                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-3">
                      <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                          <div class="card-body box-profile">
                                @if(!empty($user->foto))
                                    <img style="width: 100%; border-radius: 50%;" src="{{url("public/$user->foto")}}" class="img-fluid">
                                  @else
                                    <img style="width: 100%; border-radius: 50%;" src="{{url('public')}}/Admin/assets/img/user.png">
                                @endif
                            </div>

                            <h3 class="profile-username">{{$user->nama}}</h3>
                            <p><b>Email:</b> 
                              <a href="mailto:{{$user->email}}">
                                {{$user->email}}
                              </a>
                            </p>
                            <br>
                            <p>
                              <b>No. Telp:</b> {{$user->no_hp}}
                            </p>
                            <br>
                            <p><b>Alamat:</b> {!!nl2br($user->alamat)!!}</p>
                          </div>

                          <!-- /.card-body -->
                      </div>
                      <div class="col-md-9" style="background-color: #DCDCDC; border-radius: 5%;">
                        <div class="card-header" style="margin-top: 10px;">
                          <h2 class="title text-center">Produk</h2>
                        </div>
                        <div class="products mb-3">
                                <div class="row justify-content-left">
                                  @foreach($list_produk as $produk)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="{{url('produk', $produk->id)}}">
                                                    <img style="width: 100%; height: 210px;" src="{{url("public/$produk->foto")}}" class="img-fluid">
                                                </a>
 
                                                <div class="product-action">
                                                    <a href="{{url('produk', $produk->id)}}" class="btn-product btn-cart"><span>Detail Produk</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{$produk->kategori->nama}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{url('produk', $produk->id)}}">{{$produk->nama}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    Rp. {{number_format($produk->harga)}}
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div>
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