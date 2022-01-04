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
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('maok/produk')}}">Produk</a></li>
				  <li class="active">{{$produk->nama}}</li>
				</ol>
			</div>
			<div class="row">
				@include('Pembeli.Guest.template.sidebar')
				
				<div class="col-sm-9 padding-right">
					@include('Pembeli.template.utils.notif')
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img style="width: 100%;" src="{{url("public/$produk->foto")}}" class="img-fluid">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$produk->nama}}</h2>
								<h5><b>Kategori:</b> {{$produk->kategori->nama}}</h5>
								<span>
								<img src="{{url('public')}}/Client/images/product-details/rating.png" alt="" />
									<span>Rp. {{number_format($produk->harga)}}</span>
								</span>
								<span>
									<label>Quantity:</label>
										<input type="text" name="jumlah_pesanan" value="1" />
											<a href="{{url('maok/login')}}">
												<button type="submit" class="btn btn-default cart" style="background-color: #008080;">
												<i class="fa fa-shopping-cart"></i>
												Masukan Keranjang
												</button>
											</a>
								</span>
								<p><b>Penjual: {{($produk->seller->nama)}}</b></p>
								<p><b>Berat:</b> {{($produk->berat)}} gr</p>
								<p><b>Stok:</b> {{($produk->stok)}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Deskripsi Produk</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Profil Toko</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							@include('Pembeli.template.detail-produk.deskripsi')
							
							@include('Pembeli.template.detail-produk.profil-toko')
							
							@include('Pembeli.template.detail-produk.review')
							
						</div>
					</div><!--/category-tab-->
					
					
				</div>
			</div>
		</div>
	</section>
	
	@include('Pembeli.template.footer')
	

  
    @include('Pembeli.template.js')
</body>
</html>