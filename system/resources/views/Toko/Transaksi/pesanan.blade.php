@extends('Toko.template.base')
@section('content')

<div class="col-md-12">
	<div class="container">
		<div class="card-body">
			<h3>Pesanan</h3>
		</div>
		<div class="row">
			<div class="card-body">
				<table class="table table-datatable table-striped" style="background-color: #50d5b7; color: #FFF" >
				<thead style="background-color: #067D68; text-align: center;">
					<th style="width: 100px;">No</th>
					<th>Aksi</th>
					<th>Nama Pemesan</th>
					<th>Total Harga</th>
					<th>Status</th>
				</thead>
				<tbody style="text-align: center;">
					@foreach($list_pesanan as $pesanan)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
							<div class="btn-group">
								<a href="{{url('Toko/pesanan', $pesanan->id)}}" class="btn btn-primary" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
							</div>
						</td>
						<td style="text-align: left;">{{$pesanan->nama_pemesan}}</td>
						<td>Rp. {{number_format($pesanan->total_harga)}}</td>
						<td>
							@if($pesanan->status == '0')
							<button class="btn btn-danger">
			                   Belum Dikirim
			                </button>
			                @else($pesanan->status == '1')
			                <button class="btn btn-warning">
			                	Pesanan Sudah Dikirim
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

@endsection