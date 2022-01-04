@extends ('Admin.template.base')

@section('content')

<div class="container">
	<div class="row"> 
		<div class="col-md-12 mt-5">
			<div class="card">
				<div  class="card-header">
					<b>Tambah Metode Pembayaran</b>
				</div>
					<div class="card-body">
						<form action="{{url('Admin/pembayaran')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="" class="control-label"><b>Nama</b></label>
							<input type="text" class="form-control" name="nama">
						</div>
						<div class="form-group">
							<label for="" class="control-label"> Foto </label>
							<input type="file" class="form-control" name="foto" accept="image/*">
						</div>
						<div class="form-group">
							<label for="" class="control-label"><b>No. Rekening</b></label>
							<input type="text" class="form-control" name="rekening">
						</div>
						<div class="form-group">
							<label for="" class="control-label"><b>Atas Nama</b></label>
							<input type="text" class="form-control" name="atas_nama">
						</div>
						<div class="form-group">
							<label for="" class="control-label"><b>Pajak</b></label>
							<input type="text" class="form-control" name="pajak">
						</div>
						<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection