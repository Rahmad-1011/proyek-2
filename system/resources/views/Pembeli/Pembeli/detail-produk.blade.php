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
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">{{$produk->nama}}
						@if($produk->stok == 0)
						<span class="badge badge-danger" style="font-size: 8pt"> Stok Habis </span>
						@endif
					</h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">{{$produk->penjual->nama}}</a></li>
							<li class="list-inline-item"><i class="fa fa-tag"></i> Kategori<a href="">{{$produk->kategori->nama}}</a></li>
						</ul>
					</div>

					<!-- product slider -->
					<div class="product">
						<div class="product my-4">
							<img class="img-fluid w-100 shadow" style="border-radius: 20px;" src="{{url("public/$produk->foto")}}" alt="product-img">
						</div>
					</div>
					<!-- product slider -->

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Deskripsi Produk</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
								 aria-selected="false">Detail Produk</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Penilaian</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Deskripsi Produk</h3>
								<p>{!!nl2br($produk->deskripsi)!!}</p>

							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Spesifikasi Produk</h3>
								<table class="table table-bordered product-table">
									<tbody>
										<tr>
											<td>Harga</td>
											<td>Rp. {{number_format($produk->harga)}}</td>
										</tr>
										<tr>
											<td>Tanggal Rilis</td>
											<td>{!! date('d M Y', strtotime($produk->updated_at)) !!}</td>
										</tr>
										<tr>
											<td>Berat</td>
											<td>{{$produk->berat}}</td>
										</tr>
										<tr>
											<td>Stok</td>
											<td>{{$produk->stok}}</td>
										</tr>
										<tr>
											<td>Kategori</td>
											<td>{{$produk->kategori->nama}}</td>
										</tr>
										<tr>
											<td>Penjual</td>
											<td>{{$produk->penjual->nama}}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Penilaian Produk</h3>
								<div class="product-review">
								@foreach($komentars->sortByDesc('updated_at')->where('parent',0) as $komentar)
									<div class="media">
										<!-- Avater -->
										@if(!empty($komentar->user->foto))
    									   <img style="width: 90px; height: 90px; border-radius: 50%;" src="{{url('public')}}/{{$komentar->user->foto}}" class="img-fluid">
    								    @else
    									   <img style="width: 90px; height: 90px; border-radius: 50%;" src="{{url('public')}}/Admin/assets/img/user.png">
    								    @endif
										<div class="media-body shadow">
											<!-- Ratings -->
											<div class="ratings">
												<ul class="list-inline">
													@for($i =1; $i<= $komentar->bintang; $i++)
														<li class="list-inline-item"><i class="fa fa-star" style="color: #ffe400"></i></li>
													@endfor
													@for($j = $komentar->bintang+1; $j<=5; $j++)
														<li class="list-inline-item"><i class="fa fa-star"></i></li>
													@endfor
												</ul>
											</div>
											<div class="name">
												<h5>{{$komentar->user->nama}}, <span style="font-size: 8pt">{{$komentar->updated_at->diffForHumans()}}</span></h5>
											</div>
											<div class="review-comment">
												<p style="color: #000">
													{!!nl2br($komentar->konten)!!}
												</p>
												<img style="width: 20%" src="{{url("public/$komentar->bukti")}}" alt="">
											</div>
											@foreach($komentar->childs as $child)
											<div class="review-comment mt-4" style="border-top: #0E6655 solid 1px;">
												<p style="color: #000; margin-top: 10px">
													balasan dari toko
												</p>
												<p style="color: #000; margin-top: -10px">
													<a href="{{url('toko', $child->user_id)}}"><b>{{$child->user->nama}}</b></a>, <span style="font-size: 8pt">{{$child->updated_at->diffForHumans()}}</span>
												</p>
												<p style="color: #000; padding-left: 10px">
													{{$child->konten}}
												</p>
											</div>
											@endforeach
										</div>
									</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center shadow" style="background-color: #117A65; border-radius: 10px;">
						<h4>Harga</h4>
						<p>Rp.{{number_format($produk->harga)}}</p>
						<div class="product-ratings">
							<span style="color: #fff">{{$komentars->count()}} Penilaian</span>
							@php
								$b = number_format($bintang)
							@endphp
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
					<!-- Safety tips widget -->
					<div class="widget disclaimer text-center shadow">
						<form action="{{url('produk',$produk->id)}}/qty" method="post">
                        @csrf
						<h5 class="widget-header">Stok Produk : {{$produk->stok}}</h5>
							<ul>
								<li>
									<div class="form-group col-md-12">
										<label>Produk Yang Anda Pesan</label>
										<input type="number" style="border-radius: 20px;" class="form-control my-lg-1 w-100 shadow" name="jumlah_pesanan" value="1" min="1" step="1" data-decimals="0" required>
									</div>
								</li>
								<ul class="list-inline mt-20">
									<li class="list-inline-item">
										@if(Auth::user())
										<button type="submit" class="btn btn-contact d-inline-block btn-primary px-lg-5 my-1 px-md-3" style="background-color: #117A65; border-radius: 10px">Pesan Sekarang</button>
										@else
										<button style="background-color: #117A65; border-radius: 10px" type="button" class="btn btn-contact d-inline-block btn-primary px-lg-5 my-1 px-md-3" data-toggle="modal" data-target="#exampleModal">
		  									Pesan Sekarang
										</button>
										@endif
									</li>
								</ul>
							</ul>
						</form>
					</div>
					

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        "Silahkan Login Terlebih Dahulu Sebelum Memesan"
      </div>
      <div class="modal-footer">
        <a href="{{url('maok/login')}}" class="btn btn-primary" style="background-color: #117A65; border-radius: 10px">Login Disini</a>
      </div>
    </div>
  </div>
</div>
<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')

<!-- JAVASCRIPTS -->
@include('Pembeli.Pembeli.template.js')

</body>

</html>