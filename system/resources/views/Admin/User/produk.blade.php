@extends ('Admin.template.base')

@section ('content')
<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-8 mt-3">
			<div class="card">
				<div class="card-header">
					<h1>
					Detail Produk
					</h1>
				<div class="card-body">
					<h2 style="color: #008080;"><b>{{$produk -> nama}}</b></h2><p>by. {{($produk->seller->nama)}}</p>
					<hr>
					<p>
						<h3 style="color: #008080"><b>Rp. {{number_format($produk->harga)}}</b></h3> <br>
						Stok : {{($produk->stok)}} <br>
						Berat : {{($produk->berat)}} gr <br>
						Kategori : {{($produk->kategori->nama)}}<br>
						Tanggal Rilis : {{$produk->created_at->format("d M Y")}}
					</p>
					<p>
						<b>Deskripsi</b> <br>
						{!! nl2br ($produk->deskripsi) !!}	
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 mt-3">
		<div class="card">
			<div class="card-body">
				<img style="width: 100%;" src="{{url("public/$produk->foto")}}" class="img-fluid">
			</div>
		</div>
	</div>
</div>
@endsection