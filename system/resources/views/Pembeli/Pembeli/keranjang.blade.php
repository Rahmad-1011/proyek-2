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
<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-12 offset-md-2 col-lg-10 offset-lg-1">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					@include('Pembeli.template.utils.notif')
					<h3 class="widget-header">Keranjang Saya</h3>
					@if(!empty($pesanan))
						<table class="table table-responsive product-dashboard-table">
							<thead>
								<tr>
									<th>Gambar</th>
									<th>Detail Produk</th>
									<th class="text-center">Jumlah Pesanan</th>
									<th class="text-center">Total</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									@foreach($pesanan_details as $pesanan_detail)
									<td class="product-thumb">
										<img width="80px" height="auto" src="{{url('public')}}/{{$pesanan_detail->produk->foto}}" alt="image description"></td>
									<td class="product-details">
										<h3 class="title">{{$pesanan_detail->produk->nama}}</h3>
										<span class="add-id"><strong>Kategori:</strong> {{$pesanan_detail->produk->kategori->nama}}</span>
										<span><strong>Harga: </strong> Rp. {{number_format($pesanan_detail->produk->harga)}}</span>
										<span><strong>Qty: </strong> {{$pesanan_detail->jumlah}} pcs</span>
									</td>
									<td class="product-category"><span class="categories">{{$pesanan_detail->berat}} gr</span></td>
									<td class="product-category"><span class="categories">Rp. {{number_format($pesanan_detail->jumlah_harga)}}</span></td>
									<td class="action" data-title="Action">
										<div class="">
											<ul class="list-inline justify-content-center">
												<li class="list-inline-item">
													<form action="{{url('keranjang', $pesanan_detail->id)}}" method="post" class="delete" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
														@csrf
														@method("delete")
													<button class="delete"><i class="fa fa-trash"></i></button>
													</form>
												</li>
											</ul>
										</div>
									</td>
								</tr>
								@endforeach
								
								<tr>
									<td colspan="2" align="right"><strong>Total Harga : </strong></td>
									<td><strong> Rp. {{number_format($pesanan->jumlah_harga)}}</strong></td>
									<td colspan="2">
										<form action="{{url('konfirmasi-checkout')}}" method="POST">
											@csrf
								
										<button type="submit" class="btn btn-primary btn-order btn-block" style="background-color: #117A65; border-radius: 10px; font-size: 10pt; padding: 10px; width: 100%">Pesan Sekarang</button>
										</form>
									</td>
								</tr>
							</tbody>
						</table>
					@endif
				</div>

			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>
<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')

<!-- JAVASCRIPTS -->
@include('Pembeli.Pembeli.template.js')

</body>

</html>