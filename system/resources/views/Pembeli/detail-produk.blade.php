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
    
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('beranda')}}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{url('produk')}}">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$produk->nama}}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img style="width: 80%;" src="{{url("public/$produk->foto")}}" class="img-fluid">
                                    </figure><!-- End .product-main-image -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            @include('Pembeli.template.utils.notif')
                            <div class="product-details">
                                <h1 class="product-title">{{$produk->nama}}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    Rp. {{number_format($produk->harga)}}
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>Stok : {{$produk->stok}}</p>
                                    <p>Berat : {{$produk->berat}} gr</p>
                                </div><!-- End .product-content -->

                                <form action="{{url('produk',$produk->id)}}/qty" method="post">
                                    @csrf
                                    <div class="details-filter-row details-row-size">
                                     <label for="qty">Jumlah:</label>
                                     <div class="product-details-quantity">
                                         <input type="number" id="qty" class="form-control" name="jumlah_pesanan" value="1" min="1" step="1" data-decimals="0" required>
                                     </div><!-- End .product-details-quantity -->
                                 </div><!-- End .details-filter-row -->

                                 <div class="product-details-action">
                                  <button type="submit" class="btn-product btn-cart">+ Keranjang</button>
                              </div><!-- End .product-details-action -->
                          </form>
                          <div class="product-details-footer">
                            <div class="product-cat">
                                <span>Kategori:</span>
                                <a href="{{url('produk-kategori', $kategori->slug)}}">{{$produk->kategori->nama}}</a>
                            </div><!-- End .product-cat -->

                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Share:</span>
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <h3>Deskripsi Produk</h3>
                        <p>
                         {!!nl2br($produk->deskripsi)!!}
                     </p>
                 </div><!-- End .product-desc-content -->
             </div>
             <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                <div class="reviews">
                    <h3>Reviews</h3>
                    <div class="review">
                        <div class="row no-gutters">
                            <div class="col-sm-12">
                              @foreach($produk->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)


                              <ul 
                              style="margin-bottom: 5px; 
                              background-color: #E0FFFF;
                              border-top-right-radius: 20px;
                              border-top-left-radius: 20px;
                              border-bottom-right-radius: 20px;
                              border-bottom-left-radius: 20px;
                              -moz-border-radius-topright: 20px;
                              -moz-border-radius-bottomright: 20px;
                              -moz-border-radius-bottomleft: 20px;
                              -webkit-border-top-right-radius: 20px;
                              -webkit-border-bottom-right-radius: 20px;
                              -webkit-border-bottom-left-radius: 20px;
                              ">
                              <div class="row my-3">
                                <div class="col-md-1 my-3">
                                    <center>
                                        <img src="{{url('public')}}/{{$komentar->user->foto}}" width="50px" style="border-radius: 50%; border:3px solid #00ff00; height: 50px">
                                    </center>
                                </div>
                                <div class="col-md-10 my-3">
                                    <strong>{{$komentar->user->nama}}| <i class="fa fa-clock-o"></i>{{$komentar->created_at->diffforHumans()}}</strong>
                                        <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                </div>
                                        <p>{{$komentar->konten}}</p>
                                        <p style="float: right;"><i class="fa fa-clock"></i> {{$komentar->created_at}}</p>
                                    </div>
                                </div>
                        
                                <p style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 20px"></p>

                                @foreach($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)
                                <ul style="margin-bottom: 20px;
                                background-color: #E0FFFF; 
                                padding-left: 3.5em;
                                border-top-right-radius: 20px;
                                border-bottom-right-radius: 20px;
                                border-bottom-left-radius: 20px;
                                -moz-border-radius-topright: 20px;
                                -moz-border-radius-bottomright: 20px;
                                -moz-border-radius-bottomleft: 20px;
                                -webkit-border-top-right-radius: 20px;
                                -webkit-border-bottom-right-radius: 20px;
                                -webkit-border-bottom-left-radius: 20px;
                                ">

                                 <div class="row my-3">
                                <div class="col-md-1 my-3">
                                    <center>
                                        <img src="{{url('public')}}/{{$child->user->foto}}" width="50px" height="50px" style="border-radius: 50%; border:3px solid #00ff00">
                                    </center>
                                </div>
                                <div class="col-md-10 my-3">
                                    <strong><i class="fa fa-reply" aria-hidden="true"></i> {{$child->user->nama}} | <i class="fa fa-clock-o"></i>{{$child->created_at->diffforHumans()}}</strong>
                                        <div class="ratings-container">
                                </div>
                                        <p>{{$child->konten}}</p>
                                        <p style="float: right;"><i class="fa fa-clock"></i> {{$child->created_at}}</p>
                                    </div>
                                </div>

                             
                           </ul>
                           @endforeach
                       </ul>
                       @endforeach

                       <p style="margin-top: 40px;"><b>Write Your Review</b></p>
                       <form action="" method="post">
                        @csrf
                        <div class="row">
                          <input type="hidden" name="produk_id" value="{{$produk->id}}">
                          <input type="hidden" name="parent" value="0">
                      </div>
                      <div class="row">
                      </div>
                      <div class="row">
                          <div class="col form-group">
                            <textarea name="konten" class="form-control" type="text" placeholder="Komentar Disini*"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary">Komentar</button>
                </form>
            </div>
        </div><!-- End .row -->
    </div><!-- End .review -->
</div><!-- End .reviews -->
</div><!-- .End .tab-pane -->
</div><!-- End .tab-content -->
</div><!-- End .product-details-tab -->

<h2 class="title text-center mb-4">Mungkin Anda Tertarik ?</h2><!-- End .title text-center -->

<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
data-owl-options='{
"nav": false, 
"dots": true,
"margin": 20,
"loop": false,
"responsive": {
"0": {
"items":1
},
"480": {
"items":2
},
"768": {
"items":3
},
"992": {
"items":4
},
"1200": {
"items":4,
"nav": true,
"dots": false
}
}
}'>
@foreach($list_produk as $produk)
<div class="product product-7 text-center">
    <figure class="product-media">
        <a href="product.html">
            <img style="width: 100%; height: 280px;" src="{{url("public/$produk->foto")}}" class="img-fluid">
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
@endforeach
</div><!-- End .owl-carousel -->
</div><!-- End .container -->
</div><!-- End .page-content -->
</main>

@include('Pembeli.template.footer')



@include('Pembeli.template.js')
</body>
</html>