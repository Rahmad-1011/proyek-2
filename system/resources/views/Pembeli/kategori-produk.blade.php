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
        	<div class="page-header text-center" style="background-image: url('{{url('public')}}/Client/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">List Produk<span>{{$kategori->nama}}</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
        	
            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <div class="products mb-3">
                                <div class="row justify-content-left">
                                	@foreach($list_produk as $produk)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
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
                            </div><!-- End .products -->


                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        <li class="page-item"><a class="page-link" href="#">{!! $list_produk->links() !!}</a></li>
							    </ul>
							</nav>
                		</div><!-- End .col-lg-9 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main>
	
	@include('Pembeli.template.footer')
	

  
    @include('Pembeli.template.js')
</body>
</html>