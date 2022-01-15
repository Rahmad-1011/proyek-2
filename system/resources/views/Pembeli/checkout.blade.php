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
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
			<div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="{{url('konfirmasi-pemesanan')}}" method="post">
            				@csrf
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Detail Pembayaran</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Nama Lengkap</label>
		                						<input type="text" class="form-control" name="nama_penerima" required>
		                					</div><!-- End .col-sm-6 -->
		                					<div class="col-sm-6">
		                						<label>Kode Pos</label>
		                						<input type="text" class="form-control" name="kode_pos" required>
		                					</div>
		                				</div><!-- End .row -->

	            						<label>Alamat Lengkap</label>
	            						<input type="text" name="alamat" class="form-control">

	            						<label>Nomor Telepon Aktif</label>
	            						<input type="text" name="no_hp" class="form-control">

		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
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
		                							<td><a href="#">{{$pesanan_detail->produk->nama}}</a></td>
		                							<td>Rp. {{number_format($pesanan_detail->jumlah_harga)}}</td>
		                						</tr>
		                						<tr class="summary-subtotal">
		                							<td>Total:</td>
		                							<td>Rp. {{number_format($pesanan->jumlah_harga)}}</td>
		                						</tr>
		                					</tbody>
		                					@endforeach
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
		                					
		                					<select name="pembayaran_id" class="form-control" required="">
		                						<option value="" hidden=""> --Pilih Metode Pembayaran-- </option>
		                						@foreach($list_pembayaran as $pembayaran)
		                						<option value="{{$pembayaran->id}}">{{$pembayaran->nama}} - Ppn Rp.{{number_format($pembayaran->pajak)}}</option>
		                						@endforeach
		                					</select>
										    
										    
										</div><!-- End .accordion -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" onclick="return confirm('Lanjutkan Pemesanan?')">
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