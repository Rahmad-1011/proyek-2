@extends('Toko.template.base')
@section('content')

<div class="container">
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-5" style="margin-left: 10px; margin-bottom: 10px; margin-top: 10px;">
					<img style="width: 50%;" src="{{url("public/$produk->foto")}}" class="img-fluid">
					<h2>{{$produk -> nama}}</h2>
				</div>
				<div class="col-md-6">
					@foreach($produk->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)
						<ul style="margin-bottom: 20px; background-color: #DCDCDC;">
							<li style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
			         		 <a href=""><i class="fa fa-user"></i> {{$komentar->user->nama}}</a>, <i class="fa fa-clock-o"></i>{{$komentar->created_at->diffforHumans()}}</li>
						<p style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">{{$komentar->konten}}</p>
						<form action="" method="post" style="padding-left: 3.5em;">
				          @csrf
				          <div class="row">
				            <input type="hidden" name="produk_id" value="{{$produk->id}}">
				            <input type="hidden" name="parent" value="{{$komentar->id}}">
				          </div>
				          <div class="row">
				          </div>
				          <div class="row">
				            <div class="col form-group">
				              <textarea name="konten" class="form-control" type="text" placeholder="Komentar Disini*"></textarea>
				            </div>
				          </div>
				          <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Balas Komentar</button>
				    	</form>
					      @foreach($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)
					        <ul style="margin-bottom: 20px; background-color: #DCDCDC; padding-left: 3.5em;">
					          <li style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
					            <a href=""><i class="fa fa-user"></i> {{$child->user->nama}}</a>, <i class="fa fa-clock-o"></i>{{$child->created_at->diffforHumans()}}</li>
					        <p style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">{{$child->konten}}</p>
					        </ul>
					      @endforeach
						</ul>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection