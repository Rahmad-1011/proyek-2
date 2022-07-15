@extends ('Admin.template.base')

@section('content')

<div class="container">
	<div class="row"> 
		<div class="col-md-12 mt-5">
			<div class="card">
				<div  class="card-header">
					<b>Edit Data Kurir</b>
				</div>
					<div class="card-body">
						<form action="{{url('Admin/kurir', $kurir->id)}}" method="post" enctype="multipart/form-data">
						@csrf
						@method("PUT")
						<div class="form-group">
							<label for="" class="control-label"><b>Nama</b></label>
							<input type="text" class="form-control" name="nama" value="{{$kurir->nama}}">
						</div>
						<div class="form-group">
							<label for="" class="control-label"><b>Tarif</b></label>
							<input type="text" class="form-control" name="tarif" value="{{$kurir->tarif}}">
						</div>
						<button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection