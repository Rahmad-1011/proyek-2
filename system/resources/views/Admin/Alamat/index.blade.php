@extends ('Admin.template.base')

@section('content')

	<div class="container">
		<div class="row"> 
			<div class="col-md-12 mt-5">
				<div class="card">
					<div  class="card-header" style="color: #067D68; font-family: Arial;">
						<h2><b>Tarif</b></h2>
						<button type="button" class="btn btn-primary border-0 float-right" data-toggle="modal" data-target="#exampleModal" style="background-color: #067D68">
						  <i class="fa fa-plus"></i> Tarif
						</button>
					</div>
					<div class="card-body">
						<table class="table table-striped" style="background-color: #50d5b7; color: #FFF" >
						<thead style="background-color: #067D68; text-align: center;">
							<th style="width: 100px;">No</th>
							<th style="width: 200px;">Aksi</th>
							<th>Kode Asal</th>
							<th>Kode Tujuan</th>
							<th>Tarif</th>
						</thead>
						<tbody style="text-align: center; color: #000">
							@foreach($list_tarif as $tarif)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>
									<div class="btn-group">
										<a href="{{url('Admin/tarif', $tarif->id)}}/edit" class="btn btn-warning" style="width: 40px; border-radius: 5px; height: 31px"><i class="fa fa-edit"></i></a>
										@include('Admin.template.utils.delete', ['url'=>url('Admin/tarif', $tarif->id)])
									</div>
								</td>
								<td>{{$tarif->kode_asal}}</td>
								<td>{{$tarif->kode_tujuan}}</td>
								<td>{{$tarif->tarif}}</td>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{url('Admin/tarif')}}" method="post">
    	@csrf
      <div class="modal-body">
    	<div class="form-group">
    		<label for="">Kode Asal</label>
    		<input type="text" class="form-control" name="kode_asal">
    	</div>
    	<div class="form-group">
    		<label for="">Kode Tujuan</label>
    		<input type="text" class="form-control" name="kode_tujuan">
    	</div>
    	<div class="form-group">
    		<label for="">Tarif</label>
    		<input type="text" class="form-control" name="tarif">
    	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="background-color: #067D68">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>