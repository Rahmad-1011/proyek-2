@extends ('Admin.template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-4 mt-5">
			<div class="card">
				<div class="card-header">
					<p>Slider 1</p>
				</div>
				@if(!empty($gambar->slider_1))
					<img style="width: 100%;" src="{{url("public/$gambar->slider_1")}}" class="img-fluid">
				@else
					<img src="{{url('public')}}/Client/assets/images/demos/demo-2/slider/slide-1.jpg">
				@endif
			</div>
			<div class="card">
				<div class="card-header">
					<p>Slider 2</p>
				</div>
				@if(!empty($gambar->slider_2))
					<img style="width: 100%;" src="{{url("public/$gambar->slider_2")}}" class="img-fluid">
				@else
					<img src="{{url('public')}}/Client/assets/images/demos/demo-2/slider/slide-2.jpg">
				@endif
			</div>
			<div class="card">
				<div class="card-header">
					<p>Slider 3</p>
				</div>
				@if(!empty($gambar->slider_3))
					<img style="width: 100%;" src="{{url("public/$gambar->slider_3")}}" class="img-fluid">
				@else
					<img src="{{url('public')}}/Client/assets/images/demos/demo-2/slider/slide-3.jpg">
				@endif
			</div>
		</div>
		<div class="col-md-8 mt-5">
			<div class="card">
				<div  class="card-header">
					<b>Tambah Gambar Slider</b>
				</div>
					<div class="card-body">
						<form action="{{url('Admin/edit-slider')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="" class="control-label"> Slider 1 </label>
									<input type="file" class="form-control" name="slider_1" accept="image/*">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="" class="control-label"> Slider 2 </label>
									<input type="file" class="form-control" name="slider_2" accept="image/*">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="" class="control-label"> Slider 3 </label>
									<input type="file" class="form-control" name="slider_3" accept="image/*">
								</div>
							</div>
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