@extends('Toko.template.base')
@section('content')

<div class="col-md-12">
	<div class="container">
		<div class="row">
			<div class="card-body">
				<table class="table table-datatable table-striped" style="background-color: #50d5b7; color: #FFF" >
				<thead style="background-color: #067D68; text-align: center;">
					<th style="width: 100px;">No</th>
					<th>Aksi</th>
					<th>Nama</th>
					<th>Jumlah Komentar</th>
				</thead>
				<tbody style="text-align: center;">
					@foreach($list_produk as $produk)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
							<div class="btn-group">
								<a href="{{url('Toko/komentar', $produk->id)}}" class="btn btn-primary" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
							</div>
						</td>
						<td style="text-align: left;">{{$produk->nama}}</td>
						<td>{{$produk->komentar->count()}}</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div> 
		</div>
	</div>
</div>

@endsection