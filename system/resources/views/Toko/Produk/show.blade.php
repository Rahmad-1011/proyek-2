@extends ('Toko.template.base')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mt-3">
			<div class="card">
				<div class="card-header">
					Detail Produk
				<div class="card-body">
					<h2>{{$produk -> nama}}</h2>
					<hr>
					<p>
						<h3><b>Rp. {{number_format($produk->harga)}}</b></h3> <br>
					
				
						Stok : {{($produk->stok)}}  | <br>
					
				
						Berat : {{($produk->berat)}} gr | <br>

						Seller : {{($produk->seller->nama)}}  |

						Kategori : {{($produk->kategori->nama)}}  | <br>

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