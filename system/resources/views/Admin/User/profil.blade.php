@extends ('Admin.template.base')

@section ('content')
<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Detail Admin
				<div class="card-body">
					<h2>@if(Auth::check())
                			{{request()->user()->email}}
            			@endif
            		</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<img style="width: 100%;" src="{{url("public/$user->foto")}}" class="img-fluid">
			</div>
		</div>
	</div>
</div>
@endsection