@extends ('Admin.template.base')

@section('content')

	<div class="container">
		<div class="row"> 
			<div class="col-md-12 mt-5">
				<div class="card">
					<div  class="card-header" style="color: #067D68; font-family: Arial;">
						<h2><b>Kurir</b></h2>
						<a href="{{url('Admin/kurir/create')}}" class="btn float-right" style="background-color: #067D68; color: #fff;"><i class="fa fa-plus" style="font-size: 10pt"><b style="font-family: Arial; font-size: 10pt;"> Tambah Data</b></i></a>
					</div>
					<div class="card-body">
						<table class="table table-striped" style="background-color: #50d5b7; color: #FFF" >
						<thead style="background-color: #067D68; text-align: center;">
							<th style="width: 100px;">No</th>
							<th style="width: 200px;">Aksi</th>
							<th>Nama</th>
							<th>Tarif</th>
						</thead>
						<tbody style="text-align: center; color: #000">
							@foreach($list_kurir as $kurir)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>
									<div class="btn-group">
										<a href="{{url('Admin/kurir', $kurir->id)}}/edit" class="btn btn-warning" style="width: 40px; border-radius: 5px;"><i class="fa fa-edit"></i></a>
										@include('Admin.template.utils.delete', ['url'=>url('Admin/kurir', $kurir->id)])
									</div>
								</td>
								<td>{{$kurir->nama}}</td>
								<td>Rp. {{number_format($kurir->tarif)}}</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div> 
				</div>
			</div>
		</div>
	</div>


@endsection