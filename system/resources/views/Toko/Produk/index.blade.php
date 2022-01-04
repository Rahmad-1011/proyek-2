@extends ('Toko.template.base')

@section('content')

	<div class="container">
		<div class="row"> 
			<div class="col-md-12 mt-3">
				<div class="card">
					<div  class="card-header">
						<h2><b>Data Produk</b></h2>
						<a href="{{url('Toko/produk/create')}}" class="btn float-right" style="background-color: #067D68; color: #fff;"><i class="fa fa-plus" style="font-size: 10pt"><b style="font-family: Arial; font-size: 10pt;"> Tambah Data</b></i></a>
					</div>
					<div class="card-body">
						<table class="table table-datatable table-striped" style="background-color: #50d5b7; color: #FFF" >
						<thead style="background-color: #067D68; text-align: center;">
							<th style="width: 100px;">No</th>
							<th>Aksi</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Stok</th>
						</thead>
						<tbody style="text-align: center;">
							@foreach($list_produk as $produk)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>
									<div class="btn-group">
										<a href="{{url('Toko/produk', $produk->id)}}" class="btn btn-primary" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
										<a href="{{url('Toko/produk', $produk->id)}}/edit" class="btn btn-warning" style="width: 40px; border-radius: 5px;"><i class="fa fa-edit"></i></a>
										@include('Toko.template.utils.delete', ['url'=>url('Toko/produk', $produk->id)])
									</div>
								</td>
								<td style="text-align: left;">{{$produk->nama}}</td>
								<td>Rp. {{number_format($produk->harga)}}</td>
								<td>{{$produk->stok}}</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div> 
				</div>
			</div>
		</div>
	</div>

@endsection