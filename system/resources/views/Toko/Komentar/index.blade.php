@extends('Toko.template.base')
@section('content')

<div class="col-md-12">
	<div class="container">
		<div class="row">
			<div class="card-body">
				<table class="table table-datatable table-striped" style="background-color: #50d5b7; color: #FFF" >
				<thead style="background-color: #067D68; text-align: center;">
					<th style="width: 100px;">No</th>
					<th>Aksi</th>
					<th>Nama</th>
					<th>Jumlah Komentar</th>
				</thead>
				<tbody style="text-align: center;">
					@foreach($list_produk as $produk)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
							<div class="btn-group">
								<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info" style="width: 40px; border-radius: 5px;"><i class="fa fa-eye"></i></button>
							</div>
						</td>
						<td style="text-align: left;">{{$produk->nama}}</td>
						<td>{{$produk->komentar->count()}}</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div> 
		</div>
	</div>
</div>

<!-- Modal -->
@foreach($list_produk as $produk)
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection