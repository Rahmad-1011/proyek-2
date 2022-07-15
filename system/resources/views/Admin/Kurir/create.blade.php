@extends ('Admin.template.base')

@section('content')

<div class="container">
	<div class="row"> 
		<div class="col-md-12 mt-5">
			<div class="card">
				<div  class="card-header">
					<b>Tambah Data Kurir</b>
				</div>
					<div class="card-body">
						<form action="{{url('Admin/kurir')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="" class="control-label">Nama</label>
							<input type="text" class="form-control" name="nama" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Tarif</label>
							<input type="text" class="form-control" name="tarif" required>
						</div>
						<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection