@extends ('Admin.template.base')

@section('content')

	<div class="container">
		<div class="row"> 
			<div class="col-md-12 mt-3">
				<div class="card">
					<div  class="card-header" style="color: #067D68; font-family: Arial;">
						<span><b>Transaksi on proses</b></span>
					</div>
					<div class="card-body">
						<table class="table table-striped" style="color: #FFF" >
						<thead style="background-color: #067D68; text-align: center;">
							<th style="width: 100px;">No</th>
							<th style="width: 100px;">Aksi</th>
							<th>Nama Penerima</th>
							<th>Barang Yang Dipesan</th>
							<th>Jumlah Pesanan</th>
							<th>Total Harga</th>
							<th>Asal Toko</th>
							<th>Status</th>
						</thead>
						<tbody style="text-align: center; color: #000">
							@foreach($list_pesanan_all as $pesanan)
							<tr>
								<td style="text-align: center; ">{{$loop->iteration}}</td>
								<td style="text-align: center; ">
									<div class="btn-group">
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$pesanan->id}}" style="width: 40px; border-radius: 5px; margin-right: 5px">
										  <i class="fa fa-eye"></i>
										</button>
										@include('Admin.template.utils.delete', ['url'=>url('Admin/transaksi', $pesanan->id)])
									</div>
								</td>
								<td style="text-align: left;">{{$pesanan->pesanan->nama_penerima}}</td>
								<td>{{$pesanan->produk->nama}}</td>
								<td>{{$pesanan->jumlah}} pcs</td>
								<td>Rp. {{number_format($pesanan->pesanan->total_harga)}}</td>
								<td>{{$pesanan->produk->penjual->nama}}</td>
								<td>
									@if($pesanan->status == '2')
									<button class="btn btn-danger" style="width: 100%; font-size: 10pt">
						                Belum Dibayar
						            </button>
									@elseif($pesanan->status == '3')
									<button class="btn btn-warning" style="width: 100%; font-size: 10pt">
						                Belum Dikirim
						            </button>
					                @elseif($pesanan->status == '4')
					                <button class="btn btn-success" style="width: 100%; font-size: 10pt">
					                	Pesanan Sudah Dikirim
					                </button>
					                @else($pesanan->status == '5')
					                <button type="button" class="btn btn-primary" style="width: 100%; font-size: 10pt" data-toggle="modal" data-target="#Detail{{$pesanan->id}}">
					                	Pesanan Sudah Diterima
					                </button>
					                @endif
								</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div> 
				</div>
			</div>

			<div class="col-md-12 mt-2">
				<div class="card">
					<div  class="card-header" style="color: #067D68; font-family: Arial;">
						<span><b>Transaksi Selesai</b></span>
					</div>
					<div class="card-body">
						<table class="table table-striped" style="color: #FFF" >
						<thead style="background-color: #067D68; text-align: center;">
							<th style="width: 100px;">No</th>
							<th style="width: 100px;">Aksi</th>
							<th>Nama Penerima</th>
							<th>Barang Yang Dipesan</th>
							<th>Jumlah Pesanan</th>
							<th>Total Harga</th>
							<th>Asal Toko</th>
							<th>Status</th>
						</thead>
						<tbody style="text-align: center; color: #000">
							@foreach($list_pesanan_done as $pesanan)
							<tr>
								<td style="text-align: center; ">{{$loop->iteration}}</td>
								<td style="text-align: center; ">
									<div class="btn-group">
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$pesanan->id}}" style="width: 40px; border-radius: 5px; margin-right: 5px">
										  <i class="fa fa-eye"></i>
										</button>
										@include('Admin.template.utils.delete', ['url'=>url('Admin/transaksi', $pesanan->id)])
									</div>
								</td>
								<td style="text-align: left;">{{$pesanan->pesanan->nama_penerima}}</td>
								<td>{{$pesanan->produk->nama}}</td>
								<td>{{$pesanan->jumlah}} pcs</td>
								<td>Rp. {{number_format($pesanan->pesanan->total_harga)}}</td>
								<td>{{$pesanan->produk->penjual->nama}}</td>
								<td>
									@if($pesanan->status == '2')
									<button class="btn btn-danger" style="width: 100%; font-size: 10pt">
						                Belum Dibayar
						            </button>
									@elseif($pesanan->status == '3')
									<button class="btn btn-warning" style="width: 100%; font-size: 10pt">
						                Belum Dikirim
						            </button>
					                @elseif($pesanan->status == '4')
					                <button class="btn btn-success" style="width: 100%; font-size: 10pt">
					                	Pesanan Sudah Dikirim
					                </button>
					                @elseif($pesanan->status == '5')
					                <button type="button" class="btn btn-primary" style="width: 100%; font-size: 10pt">
					                	Pesanan Sudah Diterima
					                </button>
					                @elseif($pesanan->status == '6')
					                <button type="button" class="btn btn-info" style="width: 100%; font-size: 10pt">
					                	Transaksi Selesai
					                </button>
					                @endif
								</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div> 
				</div>
			</div>
		</div>
	</div>
<!-- Button trigger modal -->
@foreach($list_pesanan_all as $pesanan)
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal{{$pesanan->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Detail Transaksi / <span style="font-size: 10pt;"><strong>Tanggal {!! date('d M Y', strtotime($pesanan->pesanan->tanggal)) !!}</strong></span></h5>
        @if($pesanan->status == '2')
			<span class="badge badge-danger">
				Belum Dibayar
			</span>
		@elseif($pesanan->status == '3')
			<span class="badge badge-warning">
				Belum Dikirim
			</span>
		@elseif($pesanan->status == '4')
			<span class="badge badge-success">
				Pesanan Sudah Dikirim
			</span>
		@elseif($pesanan->status == '5')
			<span class="badge badge-primary">
				Pesanan Sudah Diterima
			</span>
		@elseif($pesanan->status == '6')
			<span class="badge badge-info">
				Transaksi Selesai
			</span>
		@endif

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-md-6">
		      	<span></span>
		      	<p>Nama Pemesan : <b>{{$pesanan->pesanan->nama_penerima}}</b></p>
		      	<p>Nomor HP Pemesan : <b>{{$pesanan->pesanan->no_hp}}</b></p>
		      	<p>Produk Yang Dipesan : <b>{{$pesanan->produk->nama}} / {{$pesanan->jumlah}}pcs</b></p>
		      	<p>Asal Toko : <b>{{$pesanan->produk->penjual->nama}}</b></p>
		      	<p>Pembayaran : <b>{{$pesanan->pesanan->pembayaran->nama}}</b></p>
		      	<p>Pengiriman : <b>{{$pesanan->pesanan->kurir->nama}}</b></p>
		      	<p>Tujuan Pengiriman : <b>{{$pesanan->pesanan->alamat}}</b></p>
		      </div>
		      <div class="col-md-6">
		      	<div class="card shadow">
			      	<div class="card-header">
			      		<span><strong>Bukti Pembayaran</strong></span>
			      	</div>
			      	<div class="card-body">
			      		<img style="width: 100%" src="{{url('public')}}/{{$pesanan->pesanan->foto}}" alt="">
			      	</div>
			    </div>
		      </div>
		    </div>
		  </div>
		</div>
    </div>
  </div>
</div>
@endforeach

@foreach($list_pesanan_done as $pesanan)
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal{{$pesanan->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Detail Transaksi / <span style="font-size: 10pt;"><strong>Tanggal {!! date('d M Y', strtotime($pesanan->pesanan->tanggal)) !!}</strong></span></h5>
        @if($pesanan->status == '2')
			<span class="badge badge-danger">
				Belum Dibayar
			</span>
		@elseif($pesanan->status == '3')
			<span class="badge badge-warning">
				Belum Dikirim
			</span>
		@elseif($pesanan->status == '4')
			<span class="badge badge-success">
				Pesanan Sudah Dikirim
			</span>
		@elseif($pesanan->status == '5')
			<span class="badge badge-primary">
				Pesanan Sudah Diterima
			</span>
		@elseif($pesanan->status == '6')
			<span class="badge badge-info">
				Transaksi Selesai
			</span>
		@else
		@endif
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-md-6">
		      	<span></span>
		      	<p>Nama Pemesan : <b>{{$pesanan->pesanan->nama_penerima}}</b></p>
		      	<p>Nomor HP Pemesan : <b>{{$pesanan->pesanan->no_hp}}</b></p>
		      	<p>Produk Yang Dipesan : <b>{{$pesanan->produk->nama}} / {{$pesanan->jumlah}}pcs</b></p>
		      	<p>Total Harga : <b>Rp. {{number_format($pesanan->pesanan->total_harga)}}</b></p>
		      	<p>Asal Toko : <b>{{$pesanan->produk->penjual->nama}}</b></p>
		      	<p>Nomor HP Toko : <b>{{$pesanan->produk->penjual->no_hp}}</b></p>
		      	<p>Pembayaran : <b>{{$pesanan->pesanan->pembayaran->nama}}</b></p>
		      	<p>Pengiriman : <b>{{$pesanan->pesanan->kurir->nama}}</b></p>
		      	<p>Tujuan Pengiriman : <b>{{$pesanan->pesanan->alamat}}</b></p>
		      	<p>Pembayaran Toko : <b>{{$pesanan->produk->penjual->pembayaran_nama}}, Nomor Rek. {{$pesanan->produk->penjual->pembayaran_nomor}}</b></p>
		      	
		      	<div class="card shadow">
			      	<div class="card-header">
			      		<span><strong>Bukti Produk Sampai</strong></span>
			      	</div>
			      	<div class="card-body">
			      		<img style="width: 100%"  src="{{url("public/$pesanan->bukti")}}" alt="">
			      	</div>
			    </div>
		      </div>
		      <div class="col-md-6">
		      	<div class="card shadow">
			      	<div class="card-header">
			      		<span><strong>Bukti Pembayaran</strong></span>
			      	</div>
			      	<div class="card-body">
			      		<img style="width: 100%" src="{{url('public')}}/{{$pesanan->pesanan->foto}}" alt="">
			      	</div>
			    </div>
		      </div>
		    </div>
		  </div>
		</div>
		@if($pesanan->status == '5')
      <div class="modal-footer">
      	<form action="{{url('Admin/konfirmasi-transaksi', $pesanan->pesanan_id)}}" method="POST">
      		@csrf
      		<input type="hidden" name="id" value="{{$pesanan->pesanan_id}}">
        	<button type="submit" class="btn btn-primary">Pesanan Selesai</button>
        </form>
      </div>
      @endif
    </div>
  </div>
</div>
@endforeach


@endsection