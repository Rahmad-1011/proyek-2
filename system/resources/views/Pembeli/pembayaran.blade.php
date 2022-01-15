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
                        <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
			<div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="{{url('konfirmasi-pembayaran')}}" method="post" enctype="multipart/form-data">
            				@csrf
		                	<div class="row">
		                		<aside class="col-lg-6">
		                			<div class="summary">
		                				<h3 class="summary-title">Pesanan Anda</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Produk</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>
		                					@foreach($pesanan_details as $pesanan_detail)
		                					<tbody>
		                						<tr>
		                							<td><a href="#">{{$pesanan_detail->produk->nama}} / {{$pesanan_detail->jumlah}}pcs</a></td>
		                							<td>Rp. {{number_format($pesanan_detail->jumlah_harga)}}</td>
		                						</tr>
		                						<tr class="summary-subtotal">
		                							<td>Total:</td>
		                							<td>Rp. {{number_format($pesanan->jumlah_harga)}}</td>
		                						</tr><!-- End .summary-subtotal -->
		                					@endforeach
		                						<tr>
		                							<td>Metode Pembayaran yang dipilih : </td>
		                							<td>{{$pesanan->pembayaran->nama}} <br>
		                								<p style="font-size: 8pt;">{{$pesanan->pembayaran->rekening}}</p>
		                							</td>
		                						</tr>
		                						<tr>
		                							<td>Harga Total:</td>
		                							<td>Rp. {{number_format($pesanan->jumlah_harga)}}</td>
		                						</tr>
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<label>Bukti Pembayaran</label>
		                				<input type="file" name="foto" class="form-control" accept="image/*" required>

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Lengkapi Data</span>
		                					<span class="btn-hover-text">Pesan Sekarang</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div>
		</div>
	</section> <!--/#cart_items-->

	@include('Pembeli.template.footer')
	


    @include('Pembeli.template.js')
</body>
</html>