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
        			<h1 class="page-title">List Toko<span>MAOK</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
        	
            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <div class="products mb-3">
                                <div class="row justify-content-left">
                                	@foreach($list_toko as $user)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                	@if(!empty($user->foto))
											           <img style="width: 200px; height: 200px; border-radius: 50%;" src="{{url("public/$user->foto")}}" class="img-fluid">
											          @else
											           <img src="{{url('public')}}/Admin/assets/img/user.png">
											        @endif
                                                    
                                                </a>
 
                                                <div class="product-action">
                                                    <a href="{{url('toko', $user->id)}}" class="btn-product btn-cart"><span>Detail Toko</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="{{url('toko', $user->id)}}">{{$user->nama}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{$user->no_hp}}
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .products -->


                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        <li class="page-item"><a class="page-link" href="#">{!! $list_toko->links() !!}</a></li>
							    </ul>
							</nav>
                		</div><!-- End .col-lg-9 -->
                		@include('Pembeli.template.sidebar')
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main>
	
	@include('Pembeli.template.footer')
	

  
    @include('Pembeli.template.js')
</body>
</html>