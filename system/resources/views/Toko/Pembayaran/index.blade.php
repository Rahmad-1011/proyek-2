@extends ('Toko.template.base')

@section('content')

	<div class="container">
		<div class="row"> 
			<div class="col-md-12 mt-3">
				<div class="card">
					<div  class="card-header">
						<h2><b>Metode Pembayaran</b></h2>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
						  <i class="fa fa-plus"></i> Metode Pembayaran
						</button>
					</div>
					<div class="card-body">
						<table class="table table-datatable table-striped" style="background-color: #50d5b7; color: #FFF" >
						<thead style="background-color: #067D68; text-align: center;">
							<th style="width: 100px;">No</th>
							<th>Aksi</th>
							<th> </th>
							<th>Atas Nama</th>
							<th>Nomor</th>
						</thead>
						<tbody style="text-align: center;">
							@foreach($list_pembayaran as $pembayaran)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>
									<div class="btn-group">
										<a href="{{url('Toko/pembayaran', $pembayaran->id)}}" class="btn btn-primary" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
										<a href="{{url('Toko/pembayaran', $pembayaran->id)}}/edit" class="btn btn-warning" style="width: 40px; border-radius: 5px;"><i class="fa fa-edit"></i></a>
										@include('Toko.template.utils.delete', ['url'=>url('Toko/pembayaran', $pembayaran->id)])
									</div>
								</td>
								<td>
									<img style="width: 100px" src="{{url('public',$pembayaran->pembayaran->foto)}}" alt="">
								</td>
								<td style="text-align: left;">{{$pembayaran->atas_nama}}</td>
								<td>{{$pembayaran->no}}</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div> 
				</div>
			</div>
		</div>
	</div>
	<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Metode Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<form action="{{url('Toko/pembayaran')}}" method="POST">
       		@csrf
       		<div class="row">
       		@foreach($list_metode as $metode)
       			<div class="col-md-4">
		       		<div class="form-check">
					  <input class="form-check-input" type="radio" name="pembayaran_id" id="exampleRadios{{$metode->id}}" value="{{$metode->id}}" checked>
					  <label class="form-check-label" for="exampleRadios{{$metode->id}}">
					    <img style="width: 100px; height: 100%" src="{{url("public/$metode->foto")}}" alt="">
					  </label>
					</div>
				</div>
			@endforeach
			</div>
       		<div class="form-group">
       			<label for="">Atas Nama</label>
       			<input type="text" name="atas_nama" class="form-control">
       		</div>
       		<div class="form-group">
       			<label for="">Nomor</label>
       			<input type="text" name="no" class="form-control">
       		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection