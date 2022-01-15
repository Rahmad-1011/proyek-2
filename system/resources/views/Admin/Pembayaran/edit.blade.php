@extends ('Admin.template.base')

@section('content')

<div class="container">
	<div class="row"> 
		<div class="col-md-12 mt-5">
			<div class="card">
				<div  class="card-header">
					<b>Edit Metode Pembayaran</b>
				</div>
					<div class="card-body">
						<form action="{{url('Admin/pembayaran', $pembayaran->id)}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="" class="control-label"><b>Nama</b></label>
							<input type="text" class="form-control" name="nama" value="{{$pembayaran->nama}}">
						</div>
						<div class="form-group">
							<label for="" class="control-label"> Foto </label>
							<input type="file" class="form-control" name="foto" accept="image/*">
						</div>
						<div class="form-group">
							<label for="" class="control-label"><b>No. Rekening</b></label>
							<input type="text" class="form-control" name="rekening" value="{{$pembayaran->rekening}}">
						</div>
						<div class="form-group">
							<label for="" class="control-label"><b>Atas Nama</b></label>
							<input type="text" class="form-control" name="atas_nama" value="{{$pembayaran->atas_nama}}">
						</div>
						<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection