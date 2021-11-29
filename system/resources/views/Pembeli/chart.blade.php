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
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/beranda')}}">Home</a></li>
				  <li class="active">Checkout</li>
				</ol>
			</div>
				@include('Pembeli.template.utils.notif')
					@if(!empty($pesanan))
					<p align="right">Tanggal Pesanan : {{$pesanan->tanggal}}</p>
					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image">No</td>
									<td class="description"></td>
									<td class="price">Price</td>
									<td class="quantity">Quantity</td>
									<td class="total">Total</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								@foreach($pesanan_details as $pesanan_detail)
								<tr>
									<td class="cart_product">
										{{$loop->iteration}}
									</td>
									<td class="cart_description">
										<h4><a href="">{{$pesanan_detail->produk->nama}}</a></h4>
										<p>{{$pesanan_detail->produk->kategori->nama}}</p>
									</td>
									<td class="cart_price">
										<p>Rp. {{number_format($pesanan_detail->produk->harga)}}</p>
									</td>
									<td class="cart_quantity">
										<p>{{$pesanan_detail->jumlah}} pcs</p>
									</td>
									<td class="cart_total">
										<p>Rp. {{number_format($pesanan_detail->jumlah_harga)}}</p>
									</td>
									<td>
										@include('Pembeli.template.utils.delete', ['url'=>url('checkout', $pesanan_detail->id)])
									</td>
									
								</tr>
								@endforeach
								<tr>
									<td colspan="4" align="right"><strong>Total Harga: </strong></td>
									<td><strong><p class="cart_total_price">Rp. {{number_format($pesanan->jumlah_harga)}}</p></strong></td>
									<td>
										<a href="konfirmasi-checkout" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Checkout
										</a>
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