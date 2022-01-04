@extends('Toko.template.base')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 mx-auto mt-5">
			<div class="card card-default">
				<div class="card-header bg-info">
					Ganti Password
				</div>
				<div class="card-body">
					<form action="{{url('Toko/profile/ganti-password')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="" class="control-label">Password Lama</label>
							<input type="Password" class="form-control" name="lama" @error('lama') is-invalid @enderror required>
							@error('lama')
				                <label>
				                    <div class="invalid-feedback" style="color: #FF0000">
				                        {{$message}}
				                    </div>
				                </label>
				            @enderror
						</div>
						<hr>
						<div class="form-group">
							<label for="" class="control-label">Password Baru</label>
							<input type="Password" class="form-control" name="baru" @error('baru') is-invalid @enderror required>
							@error('baru')
				                <label>
				                    <div class="invalid-feedback" style="color: #FF0000">
				                        {{$message}}
				                    </div>
				                </label>
				            @enderror
						</div>
						<div class="form-group">
							<label for="" class="control-label">Konfimasi Password Baru</label>
							<input type="Password" class="form-control" name="konfirmasi" @error('konfirmasi') is-invalid @enderror required>
							@error('konfirmasi')
				                <label>
				                    <div class="invalid-feedback" style="color: #FF0000">
				                        {{$message}}
				                    </div>
				                </label>
				            @enderror
						</div>
						<div class="form-group">
							<button class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection