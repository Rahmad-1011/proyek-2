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

	<section id="cart_items">
		<div class="container">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{url('produk')}}">Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
				@include('Pembeli.template.utils.notif')
					@if(!empty($pesanan))
					<p align="right">Tanggal Pesanan : {{$pesanan->tanggal}}</p>
					<div class="col-lg-12">
						<table class="table table-cart table-mobile">
							<thead>
								<tr class="cart_menu">
									<td></td>
									<td>Produk</td>
									<td>Harga</td>
									<td>Jumlah</td>
									<td>Total</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@foreach($pesanan_details as $pesanan_detail)
								<tr>
									<td>
										<input type="checkbox" name="status" value="1">
									</td>
									<td class="product-col">
										<div class="product">
											<figure class="product-media">
												<a href="">
													<img style="width: 80px; height: 80px;" src="{{url('public')}}/{{$pesanan_detail->produk->foto}}" class="img-fluid">
												</a>
											</figure>

											<h3 class="product-title">
												<a href="#">{{$pesanan_detail->produk->nama}}</a>
												<p>{{$pesanan_detail->produk->kategori->nama}}</p>
											</h3><!-- End .product-title -->
										</div><!-- End .product -->
									</td>
									<td class="cart_price">
										<p>Rp. {{number_format($pesanan_detail->produk->harga)}}</p>
									</td>
									<td class="cart_quantity">
										<p>{{$pesanan_detail->jumlah}} pcs / {{$pesanan_detail->produk->berat}}gr</p>
									</td>
									<td class="cart_total">
										<p>Rp. {{number_format($pesanan_detail->jumlah_harga)}}</p>
									</td>
									<td class="remove-col">
										<form action="{{url('keranjang', $pesanan_detail->id)}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
											@csrf
											@method("delete")
										<button class="btn-remove"><i class="icon-close"></i></button>
										</form>
									</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="2" align="right"><strong>Total Harga : </strong></td>
									<td><strong> Rp. {{number_format($pesanan->jumlah_harga)}}</strong></td>
									<td>
										<a href="{{url('konfirmasi-checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">LANJUT PESANAN</a>
									</td>
								</tr>
							</tbody>
						</table>
					@endif
					</div>
		</div>
	</section> <!--/#cart_items-->

	@include('Pembeli.template.footer')
	


    @include('Pembeli.template.js')
</body>
</html>