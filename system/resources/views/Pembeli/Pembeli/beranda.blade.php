<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  @include('Pembeli.Pembeli.template.css')


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


@include('Pembeli.Pembeli.template.header')

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area text-center overly" style="background-color: #117A65">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					@include('Admin.template.utils.notif')
					<h1>Marketplace Oleh-oleh Khas Ketapang </h1>
					<p>Carilah Oleh-oleh Khas Ketapang yang Kalian Inginkan <br>
						Selamat Berbelanja
					</p>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search shadow" style="border-radius: 20px">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center" >
										<form action="{{url('produk/cari')}}" method="post">
											<div class="form-row">
												@csrf
												<div class="form-group col-md-10">
													<input type="text" name="nama" value="{{$nama ??""}}" style="border-radius: 20px" class="form-control my-2 my-lg-1 w-100 shadow" id="inputtext4" placeholder="Cari Produk">
												</div>
												<div class="form-group col-md-2 align-self-center">
													<button type="submit" class="btn btn-primary shadow" style="background-color: #117A65; border-radius: 20px;">Cari</button>
												</div>
											</div>
										</form>
									</div>
								</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Produk Rekomendasi</h2>
					<p>Produk yang direkomendasikan untuk Anda</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">
					@foreach($list_produk_rekomendasi as $produk)
					<?php 
						$komentars = \App\Models\Komentar::where('produk_id', $produk->id)->where('parent',0)->get();
						$jumlah_bintang = \App\Models\Komentar::where('produk_id', $produk->id)->sum('bintang');

						if($komentars->count() > 0){
							$bintang = $jumlah_bintang/$komentars->count();
						}
						else{
							$bintang = 0;
						}

						$b = number_format($bintang)
					?>

					@if($b >=3 )
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
						<div class="product-item bg-light shadow">
							<div class="card">
								<div class="thumb-content">
									<!-- <div class="price">$200</div> -->
									<a href="{{url('produk', $produk->id)}}">
										<img class="card-img-top img-fluid" style="width: 100%; height: 240px" src="{{url("public/$produk->foto")}}" alt="Card image cap">
									</a>
								</div>
								<div class="card-body">
								    <h4 class="card-title"><a href="{{url('produk', $produk->id)}}">{{$produk->nama}}</a>
								    	@if($produk->stok == 0)
											<span class="badge badge-danger" style="font-size: 8pt"> Stok Habis </span>
										@else
											<span class="badge badge-success" style="font-size: 8pt"> Stok Ada </span>
										@endif
								    </h4>
								    <ul class="list-inline product-meta">
								    	<li class="list-inline-item">
								    		<a href="{{url('produk/kategori', $produk->id_kategori)}}"><i class="fa fa-tag"></i>{{$produk->kategori->nama}}</a>
								    	</li>
								    	<li class="list-inline-item">
								    		<a href="#"><i class="fa fa-calendar"></i>{!! date('d M Y', strtotime($produk->updated_at)) !!}</a>
								    	</li>
								    </ul>
								    <ul class="list-inline product-meta">
								    	<li class="list-inline-item">
								    		<a href="{{url('produk/kategori', $produk->id_kategori)}}"><i class="fa fa-vcard"></i>{{$produk->penjual->nama}}</a>
								    	</li>
								    </ul>
								    <p class="card-text"><span style="font-size: 8pt">Rp</span>{{number_format($produk->harga)}}</p>
								    <div class="product-ratings">
										
										
										<span>{{$komentars->count()}} Penilaian</span>
										<ul class="list-inline">
											@for($i =1; $i<= $b; $i++)
												<li class="list-inline-item"><i class="fa fa-star" style="color: #ffe400"></i></li>
											@endfor
											@for($j = $b+1; $j<=5; $j++)
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											@endfor
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif

					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<section class="popular-deals section bg-gray" style="margin-top: -100px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Produk Terbaru</h2>
					<p>Produk terbaru dari MAOK</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">
					@foreach($list_produk->sortByDesc('created_at') as $produk)
					<?php 
						$komentars = \App\Models\Komentar::where('produk_id', $produk->id)->where('parent',0)->get();
						$jumlah_bintang = \App\Models\Komentar::where('produk_id', $produk->id)->sum('bintang');

						if($komentars->count() > 0){
							$bintang = $jumlah_bintang/$komentars->count();
						}
						else{
							$bintang = 0;
						}

						$b = number_format($bintang)
					?>

					@if($b >=3 )
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
						<div class="product-item bg-light shadow">
							<div class="card">
								<div class="thumb-content">
									<!-- <div class="price">$200</div> -->
									<a href="{{url('produk', $produk->id)}}">
										<img class="card-img-top img-fluid" style="width: 100%; height: 240px" src="{{url("public/$produk->foto")}}" alt="Card image cap">
									</a>
								</div>
								<div class="card-body">
								    <h4 class="card-title"><a href="{{url('produk', $produk->id)}}">{{$produk->nama}}</a>
								    	@if($produk->stok == 0)
											<span class="badge badge-danger" style="font-size: 8pt"> Stok Habis </span>
										@else
											<span class="badge badge-success" style="font-size: 8pt"> Stok Ada </span>
										@endif
								    </h4>
								    <ul class="list-inline product-meta">
								    	<li class="list-inline-item">
								    		<a href="{{url('produk/kategori', $produk->id_kategori)}}"><i class="fa fa-tag"></i>{{$produk->kategori->nama}}</a>
								    	</li>
								    	<li class="list-inline-item">
								    		<a href="#"><i class="fa fa-calendar"></i>{!! date('d M Y', strtotime($produk->updated_at)) !!}</a>
								    	</li>
								    </ul>
								    <ul class="list-inline product-meta">
								    	<li class="list-inline-item">
								    		<a href="{{url('produk/kategori', $produk->id_kategori)}}"><i class="fa fa-vcard"></i>{{$produk->penjual->nama}}</a>
								    	</li>
								    </ul>
								    <p class="card-text"><span style="font-size: 8pt">Rp</span>{{number_format($produk->harga)}}</p>
								    <div class="product-ratings">
										
										
										<span>{{$komentars->count()}} Penilaian</span>
										<ul class="list-inline">
											@for($i =1; $i<= $b; $i++)
												<li class="list-inline-item"><i class="fa fa-star" style="color: #ffe400"></i></li>
											@endfor
											@for($j = $b+1; $j<=5; $j++)
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											@endfor
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif

					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>Kategori</h2>
					<p>Kategori oleh-oleh MAOK</p>
				</div>
				<div class="row">
					@foreach($list_kategori as $kategori)
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block shadow" style="border-radius: 20px;">
							<div class="header">
								<i class="fa fa-folder-open-o icon-bg-2"></i> 
								<h4>{{$kategori->nama}}</h4>
								<span><strong>{{$kategori->produk->count()}}</strong></span>
							</div>
						</div>
					</div> <!-- /Category List -->				
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--====================================
=            Call to Action            =
=====================================-->

<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')

<!-- JAVASCRIPTS -->
@include('Pembeli.Pembeli.template.js')

</body>

</html>



