@extends('Toko.template.base')
@section('content')

<div class="col-md-12">
	<div class="container">
		<div class="card-body">
			<h3>Pesanan</h3>
		</div>
		<div class="row">
			<div class="card-body">
				<table class="table table-datatable table-striped">
				<thead style="background-color: #067D68; text-align: center; color: #fff">
					<th style="width: 100px;">No</th>
					<th>Aksi</th>
					<th>Nama Pemesan</th>
					<th>Nama Produk</th>
					<th>Total Harga</th>
					<th>Status</th>
				</thead>
				<!-- Modal -->
				<tbody style="text-align: center;">
					@foreach($list_pesanan->sortBy('updated_at')->sortBy('status') as $pesanan)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{$pesanan->id}}">
								  <i class="fa fa-eye"></i>
								</button>
							</div>
						</td>
						<td style="text-align: left;">{{$pesanan->nama_pemesan}}</td>
						<td>{{$pesanan->nama_produk}}</td>
						<td>Rp. {{number_format($pesanan->total_harga)}}</td>
						<td>
							@if($pesanan->status == '3')
							<span class="badge badge-danger">
				                Belum Dikirim
				            </span>
			                @elseif($pesanan->status == '4')
			                <span class="badge badge-warning">
			                	Pesanan Sudah Dikirim
			                </span>
			                @elseif($pesanan->status == '5')
			                <span class="badge badge-success">
			                	Pesanan Sudah Diterima
			                </span>
			                <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#Detail{{$pesanan->id}}"><i class="fa fa-info"></i></button>
			                @elseif($pesanan->status == '6')
			                <span class="badge badge-info">
			                	Transaksi Selesai
			                </span>
			                <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#Detail{{$pesanan->id}}"><i class="fa fa-info"></i></button>
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
				@foreach($list_pesanan as $pesanan)
				<div class="modal fade" id="Modal{{$pesanan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">{{$pesanan->nama_produk}}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<span>Nama Pemesan : {{$pesanan->nama_pemesan}} / {{$pesanan->no_hp_pemesan}}</span><br>
				      	<span>Total Biaya : Rp. {{number_format($pesanan->total_harga)}}</span><br>
				      	<span>Jasa Pengiriman : {{$pesanan->nama_kurir}}</span><br>
				      	<span>Alamat Pengiriman : {{$pesanan->alamat_tujuan}}</span><br>
				      	<strong>Bukti Pembayaran</strong>
				        <img style="width: 100%" src="{{url("public/$pesanan->bukti_pembayaran")}}" alt="">
				      </div>
				      <div class="modal-footer">
				      	@if($pesanan->status=='3')
				      	<form action="{{url('Toko/pesanan/kirim', $pesanan->id)}}" method="POST">
							@csrf
							@method("PUT")
							<input type="hidden" name="id" value="{{$pesanan->id}}">
							<button type="submit" class="btn btn-warning">
				                Kirim Barang
				            </button>
			            </form>
			            @endif
				      </div>
				    </div>
				  </div>
				</div>
				@endforeach

				@foreach($list_pesanan as $pesanan)
				<div class="modal fade" id="Detail{{$pesanan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">{{$pesanan->nama_produk}} 
				        	@if($pesanan->status == 5)
				        		<span class="badge badge-success float-right" style="font-size: 8pt">
			                		Pesanan Sudah Diterima
			                	</span>
				        	@else($pesanan->status == 6)
				        		<span class="badge badge-info float-right" style="font-size: 8pt">
				                	Transaksi Selesai
				                </span>
				        	@endif
				        </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<span>Nama Pemesan : {{$pesanan->nama_pemesan}}</span><br>
				      	<span>Total Biaya : Rp. {{number_format($pesanan->total_harga)}}</span><br>
				      	<span>Jasa Pengiriman : {{$pesanan->nama_kurir}}</span><br>
				      	<strong>Bukti Barang Diterima</strong>
				        <img style="width: 100%" src="{{url("public/$pesanan->bukti_barang_diterima")}}" alt="">
				      </div>
				    </div>
				  </div>
				</div>
				@endforeach



@endsection