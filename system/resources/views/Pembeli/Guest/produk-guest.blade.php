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
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				@include('Pembeli.Guest.template.sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Produk Oleh-oleh</h2>
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
					<div class="row">
						<div class="col-md-12">
							<div class="d-flex pagination" style="margin-left: 340px;">
								{!! $list_produk->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	@include('Pembeli.template.footer')
	

  
    @include('Pembeli.template.js')
</body>
</html>