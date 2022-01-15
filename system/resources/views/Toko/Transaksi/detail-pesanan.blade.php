@extends ('Toko.template.base')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mt-3">
			<div class="card">
				<div  class="card-header">
					<b>Detail Pesanan</b>
				</div>
					<div class="card-body">
						<table class="table table-datatable table-bordered table-striped" style="width: 100%">
						<tbody style="text-align: center;">
							<tr>
								<td style="text-align: left;">Barang yang di pesan :</td>
								@foreach($pesanan_details as $pesanan_detail)
								<td style="text-align: left;">Nama: {{$pesanan_detail->produk->nama}} <br>Jumlah: {{$pesanan_detail->jumlah}} pcs</td>
								@endforeach
							</tr>
							<tr>
								<td style="text-align: left;">Nama Pemesan :</td>
								<td style="text-align: left;">{{$pesanan->nama_penerima}}</td>
							</tr>
							<tr>
								<td style="text-align: left;">Tanggal Pemesanan :</td>
								<td style="text-align: left;">{{$pesanan->tanggal}}</td>
							</tr>
							<tr>
								<td style="text-align: left;">Alamat :</td>
								<td style="text-align: left;">
									{{$pesanan->alamat}}
								</td style="text-align: left;">
							</tr>
							<tr>
								<td style="text-align: left;">Kode Pos :</td>
								<td style="text-align: left;">{{$pesanan->kode_pos}}</td>
							</tr>
						</tbody>
						</table>
						<div class="row mt-4">
							<form action="{{url('Toko/pesanan', $pesanan->id)}}/kirim" method="post">
								@csrf
								@method("PUT")
								<input type="hidden" value="1" required="" name="status">
								<button class="btn btn-warning" onclick="return confirm('Yakin untuk mengubah status?')">Kirim Barang <i class="fa fa-paper-plane"></i></button>
							</form>
						</div>
					</div> 
			</div>
		</div>
	<div class="col-md-4 mt-3">
		<div class="card">
			<div class="card-header">
				<b>Bukti Pembayaran</b>
			</div>
			<div class="card-body">
				<img style="width: 100%;" src="{{url("public/$pesanan->foto")}}" class="img-fluid">
			</div>
		</div>
	</div>
	</div>
</div>
@endsection