@extends ('Toko.template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-4 mt-5">
			<div class="card">
				<div class="card-body">
					<img style="width: 100%;" src="{{url("public/$produk->foto")}}" class="img-fluid">
				</div>
			</div>
		</div>
		<div class="col-md-8 mt-5">
			<div class="card">
				<div  class="card-header">
					<b>Tambah Data Produk</b>
				</div>
					<div class="card-body">
						<form action="{{url('Toko/produk', $produk->id)}}" method="post">
						@csrf
						@method("PUT")
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="control-label"><b>Nama</b></label>
									<input type="text" class="form-control" value="{{$produk->nama}}" name="nama">
								</div>
							</div>
							<div class="col-md-6">
								<label for="" class="control-label"> Kategori </label>
								<select name="id_kategori" class="form-control">
								<option>Pilih Kategori</option>
									@foreach($list_kategori as $kategori)
										<option value="{{$kategori->id}}">{{$kategori->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label"><b>Harga</b></label>
							<input type="text" class="form-control" name="harga" value="{{$produk->harga}}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="control-label"><b>Berat</b></label>
							<input type="text" class="form-control" name="berat" value="{{$produk->berat}}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="" class="control-label"><b>Stok</b></label>
							<input type="text" class="form-control" name="stok" value="{{$produk->stok}}">
						</div>
					</div>
				</div>
					<div class="form-group">
							<label for="" class="control-label"><b>Deskripsi</b></label>
							<textarea name="deskripsi" id="deskripsi" class="form-control">{{$produk->deskripsi}}</textarea>
						</div>
						<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@push('style')
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('script')
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<script>
		$(document).ready(function() {
  		$('#deskripsi').summernote();
		});
	</script>
@endpush