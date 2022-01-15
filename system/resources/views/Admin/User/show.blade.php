@extends('Admin.template.base')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="card">
				<div class="card-header">
					<h2>Detail Toko : {{$user->nama}}</h2>
				</div>
				<div class="card-body">
					<div class="card">
						Alamat : {!!nl2br($user->alamat)!!} <br>
						No. Telp : {{$user->no_hp}}
					</div>
					<table class="table table-striped" style="background-color: #50d5b7; color: #FFF" >
			            <thead style="background-color: #067D68; text-align: center;">
			              <th style="width: 100px;">No</th>
			              <th>Aksi</th>
			              <th></th>
			              <th style="width: 200px;">Nama Produk</th>
			              <th>Stok</th>
			              <th>Harga</th>
			            </thead>
			            <tbody style="text-align: center; color: #000">
			              @foreach($list_produk as $produk)
			              <tr>
			                <td>{{$loop->iteration}}</td>
			                <td>
			                	<div class="btn-group">
				                    <a href="{{url('Admin/toko/detail-produk', $produk->id)}}" class="btn btn-primary" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
				                    @include('Admin.template.utils.delete', ['url'=>url('Admin/toko/hapus-produk', $produk->id)])
				                </div>
			                </td>
			                <td>
			                	<img src="{{url("public/$produk->foto")}}" class="img-fluid" style="width: 120px;">
			                </td>
			                <td>{{$produk->nama}}</td>
			                <td>{{$produk->stok}}</td>
			                <td>Rp. {{number_format($produk->harga)}}</td>
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