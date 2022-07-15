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
@include('Pembeli.Pembeli.template.cari')
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result">
					<h2><u>Detail Toko Oleh-oleh Khas Ketapang</u></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget user text-center shadow">
						@if(!empty($user->foto))
    						<img class="rounded-circle img-fluid mb-5 px-5" style="width: 90px; height: 90px; border-radius: 50%;" src="{{url("public/$user->foto")}}" class="img-fluid">
    					@else
    						<img style="width: 90px; height: 90px; border-radius: 50%; margin-bottom: 10px;" src="{{url('public')}}/Admin/assets/img/user.png">
    					@endif
						<h4>{{$user->nama}}</h4>
						<p class="member-time">{{$user->nama_pemilik}}</p>
						<p class="member-time">
							Alamat : {{$user->alamat}} <br><br>
							<strong>No. HP {{$user->no_hp}}</strong><br>

						</p>
					</div>

				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<strong>Sortir</strong>
							<select>
								<option>Sering Ditampilkan</option>
								<option value="1">Terpopuler</option>
								<option value="2">Harga Termurah</option>
								<option value="4">Harga Termahal</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="advance-search">
								<form>
									<div class="form-row">
										<div class="form-group col-md-10">
											<input type="text" style="border-radius: 20px;" class="form-control my-2 my-lg-1 w-100 shadow" id="inputtext4" placeholder="Cari Produk">
										</div>
										<div class="form-group col-md-2 align-self-center">
											<button type="submit" class="btn btn-primary shadow border-0" style="border-radius: 20px; color: #fff; background-color: #117A65">Cari</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">
						@foreach($list_produk as $produk)
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light shadow">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										<a href="{{url('produk', $produk->id)}}">
											<img style="width: 100%; height: 210px;" class="card-img-top img-fluid" src="{{url("public/$produk->foto")}}" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="{{url('produk', $produk->id)}}">{{$produk->nama}}</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href="{{url('produk', $produk->id)}}"><i class="fa fa-folder-open-o"></i>{{$produk->kategori->nama}}</a>
									    	</li>
									    </ul>
									    <p class="card-text">Rp. {{number_format($produk->harga)}}</p>
									    <div class="product-ratings">
									    	<ul class="list-inline">
									    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
									    	</ul>
									    </div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="pagination justify-content-center">
					{!! $list_produk->links() !!}
				</div>
			</div>
		</div>
	</div>
</section>
<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')

<!-- JAVASCRIPTS -->
@include('Pembeli.Pembeli.template.js')

</body>

</html>