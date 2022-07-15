<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  @include('Pembeli.Pembeli.template.css')


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">

@include('Pembeli.Pembeli.template.header')
<!--==================================
=            User Profile            =
===================================-->
@include('Pembeli.Pembeli.template.cari')
<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			@include('Pembeli.Pembeli.template.side-profil')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Pesanan Saya</h3>
					<div class="row">
			          <div class="col-12">
			            <!-- Custom Tabs -->
			            <div class="card shadow border-0">
			              <div class="card-header p-0">
			                <ul class="nav nav-pills ml-auto mt-1 mb-1 p-1">
			                  <li class="nav-item"><a class="nav-link active" href="#tab_semua" data-toggle="tab">Semua</a></li>
			                  <li class="nav-item"><a class="nav-link" href="#tab_belumbayar" data-toggle="tab">Belum Bayar</a></li>
			                  <li class="nav-item"><a class="nav-link" href="#tab_dikemas" data-toggle="tab">Dikemas</a></li>
			                  <li class="nav-item"><a class="nav-link" href="#tab_dikirim" data-toggle="tab">Dikirim</a></li>
			                  <li class="nav-item"><a class="nav-link" href="#tab_selesai" data-toggle="tab">Selesai</a></li>
			                </ul>
			              </div><!-- /.card-header -->
			              <div class="card-body">
			                <div class="tab-content">
			                  <div class="tab-pane active" id="tab_semua">
			                    <table class="table table-responsive product-dashboard-table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Detail Pesanan</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list_pesanan->sortByDesc('updated_at')->sortBy('status') as $p)
										<tr>
											<td class="product-thumb">
												<img width="80px" height="auto" src="{{url("public/$p->foto")}}" alt="image description"></td>
											<td class="product-details">
												<h3 class="title">{{ucwords($p->nama)}}</h3>
												<span class="add-id"><strong>Qty:</strong> {{$p->jumlah}}</span>
												<span><strong>Total Harga: </strong><time>Rp. {{number_format($p->jumlah_harga)}}</time> </span>
												<span class="location"><strong>Penerima:</strong> {{ucwords($p->nama_penerima)}}</span>
											</td>
											<td class="product-category">
												@if($p->status==5)
												<button class="btn btn-primary" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Diterima</button>
												@elseif($p->status==4)
						                        <button class="btn btn-success" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikirim</button>
						                        @elseif($p->status==3)
						                        <button class="btn btn-warning" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikemas</button>
						                        @else
						                        <button class="btn btn-danger" style="font-size: 8pt; padding: 4px; border-radius: 10px">Pesanan Belum Bayar</button>

						                        @endif
											</td>
											<td class="action" data-title="Action">
												<div class="">
													<ul class="list-inline justify-content-center">
														@if($p->status==5)
														@elseif($p->status==4)
														<li class="list-inline-item">
																<button data-toggle="modal" data-target="#Modal{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Diterima" class="btn btn-success" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-check"></i>
																</button>
														</li>
														@elseif($p->status==3)
														@else

														<li class="list-inline-item">
															<a data-toggle="tooltip" data-placement="top" title="Bayar" class="view" href="{{url('pembayaran', $p->id)}}">
																<i class="fa fa-money"></i>
															</a>
														</li>

														@endif
													</ul>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_belumbayar">
			                    <table class="table table-responsive product-dashboard-table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Detail Pesanan</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list_pesanan->sortBy('id') as $p)
										@if($p->status==2)
										<tr>
											<td class="product-thumb">
												<img width="80px" height="auto" src="{{url("public/$p->foto")}}" alt="image description"></td>
											<td class="product-details">
												<h3 class="title">{{ucwords($p->nama)}}</h3>
												<span class="add-id"><strong>Qty:</strong> {{$p->jumlah}}</span>
												<span><strong>Total Harga: </strong><time>Rp. {{number_format($p->jumlah_harga)}}</time> </span>
												<span class="location"><strong>Penerima:</strong> {{ucwords($p->nama_penerima)}}</span>
											</td>
											<td class="product-category">
												@if($p->status==5)
												<button class="btn btn-primary" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Diterima</button>
												@elseif($p->status==4)
						                        <button class="btn btn-success" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikirim</button>
						                        @elseif($p->status==3)
						                        <button class="btn btn-warning" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikemas</button>
						                        @else
						                        <button class="btn btn-danger" style="font-size: 8pt; padding: 4px; border-radius: 10px">Pesanan Belum Bayar</button>

						                        @endif
											</td>
											<td class="action" data-title="Action">
												<div class="">
													<ul class="list-inline justify-content-center">
														@if($p->status==5)
														@elseif($p->status==4)
														<li class="list-inline-item">
															<form action="{{url('konfirmasi-barang', $p->pesanan_id)}}" method="POST">
																@csrf
																<button data-toggle="tooltip" data-placement="top" title="Diterima" class="btn btn-success" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-check"></i>
																</button>
															</form>
														</li>
														@elseif($p->status==3)
														@else
														<li class="list-inline-item">
															<a data-toggle="tooltip" data-placement="top" title="Bayar" class="view" href="{{url('pembayaran', $p->pesanan_id)}}">
																<i class="fa fa-money"></i>
															</a>
														</li>
														@endif
													</ul>
												</div>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_dikemas">
			                    <table class="table table-responsive product-dashboard-table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Detail Pesanan</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list_pesanan->sortBy('id') as $p)
										@if($p->status==3)
										<tr>
											<td class="product-thumb">
												<img width="80px" height="auto" src="{{url("public/$p->foto")}}" alt="image description"></td>
											<td class="product-details">
												<h3 class="title">{{ucwords($p->nama)}}</h3>
												<span class="add-id"><strong>Qty:</strong> {{$p->jumlah}}</span>
												<span><strong>Total Harga: </strong><time>Rp. {{number_format($p->jumlah_harga)}}</time> </span>
												<span class="location"><strong>Penerima:</strong> {{ucwords($p->nama_penerima)}}</span>
											</td>
											<td class="product-category">
												@if($p->status==5)
												<button class="btn btn-primary" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Diterima</button>
												@elseif($p->status==4)
						                        <button class="btn btn-success" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikirim</button>
						                        @elseif($p->status==3)
						                        <button class="btn btn-warning" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikemas</button>
						                        @else
						                        <button class="btn btn-danger" style="font-size: 8pt; padding: 4px; border-radius: 10px">Pesanan Belum Bayar</button>

						                        @endif
											</td>
											<td class="action" data-title="Action">
												<div class="">
													<ul class="list-inline justify-content-center">
														@if($p->status==5)
														@elseif($p->status==4)
														<li class="list-inline-item">
															<form action="{{url('konfirmasi-barang', $p->pesanan_id)}}" method="POST">
																@csrf
																<button data-toggle="tooltip" data-placement="top" title="Diterima" class="btn btn-success" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-check"></i>
																</button>
															</form>
														</li>
														@elseif($p->status==3)
														@else
														<li class="list-inline-item">
															<a data-toggle="tooltip" data-placement="top" title="Edit" class="view" href="{{url('pembayaran', $p->pesanan_id)}}">
																<i class="fa fa-dolar-sign"></i>
															</a>
														</li>
														@endif
													</ul>
												</div>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_dikirim">
			                    <table class="table table-responsive product-dashboard-table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Detail Pesanan</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list_pesanan->sortBy('id') as $p)
										@if($p->status==4)
										<tr>
											<td class="product-thumb">
												<img width="80px" height="auto" src="{{url("public/$p->foto")}}" alt="image description"></td>
											<td class="product-details">
												<h3 class="title">{{ucwords($p->nama)}}</h3>
												<span class="add-id"><strong>Qty:</strong> {{$p->jumlah}}</span>
												<span><strong>Total Harga: </strong><time>Rp. {{number_format($p->jumlah_harga)}}</time> </span>
												<span class="location"><strong>Penerima:</strong> {{ucwords($p->nama_penerima)}}</span>
											</td>
											<td class="product-category">
												@if($p->status==5)
												<button class="btn btn-primary" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Diterima</button>
												@elseif($p->status==4)
						                        <button class="btn btn-success" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikirim</button>
						                        @elseif($p->status==3)
						                        <button class="btn btn-warning" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikemas</button>
						                        @else
						                        <button class="btn btn-danger" style="font-size: 8pt; padding: 4px; border-radius: 10px">Pesanan Belum Bayar</button>

						                        @endif
											</td>
											<td class="action" data-title="Action">
												<div class="">
													<ul class="list-inline justify-content-center">
														@if($p->status==5)
														@elseif($p->status==4)
														<li class="list-inline-item">
																<button data-toggle="modal" data-target="#Modal{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Diterima" class="btn btn-success" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-check"></i>
																</button>
														</li>
														@elseif($p->status==3)
														@else
														<li class="list-inline-item">
															<a data-toggle="tooltip" data-placement="top" title="Edit" class="view" href="{{url('pembayaran', $p->pesanan_id)}}">
																<i class="fa fa-dolar-sign"></i>
															</a>
														</li>
														@endif
													</ul>
												</div>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_selesai">
			                    <table class="table table-responsive product-dashboard-table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Detail Pesanan</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list_pesanan->sortBydesc('id') as $p)
										@if($p->status==5)
										<tr>
											<td class="product-thumb">
												<img width="80px" height="auto" src="{{url("public/$p->foto")}}" alt="image description"></td>
											<td class="product-details">
												<h3 class="title">{{ucwords($p->nama)}}</h3>
												<span class="add-id"><strong>Qty:</strong> {{$p->jumlah}}</span>
												<span><strong>Total Harga: </strong><time>Rp. {{number_format($p->jumlah_harga)}}</time> </span>
												<span class="location"><strong>Penerima:</strong> {{ucwords($p->nama_penerima)}}</span>
											</td>
											<td class="product-category">
												@if($p->status==5)
												<button class="btn btn-primary" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Diterima</button>
												@elseif($p->status==4)
						                        <button class="btn btn-success" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikirim</button>
						                        @elseif($p->status==3)
						                        <button class="btn btn-warning" style="font-size: 8pt; padding: 4px; border-radius: 10px">Produk Dikemas</button>
						                        @else
						                        <button class="btn btn-danger" style="font-size: 8pt; padding: 4px; border-radius: 10px">Pesanan Belum Bayar</button>

						                        @endif
											</td>
											<td class="action" data-title="Action">
												<div class="">
													<ul class="list-inline justify-content-center">
														@if($p->status==5)
														@elseif($p->status==4)
														<li class="list-inline-item">
															<form action="{{url('konfirmasi-barang', $p->pesanan_id)}}" method="POST">
																@csrf
																<button data-toggle="tooltip" data-placement="top" title="Diterima" class="btn btn-success" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-check"></i>
																</button>
															</form>
														</li>
														@elseif($p->status==3)
														@else
														<li class="list-inline-item">
															<a data-toggle="tooltip" data-placement="top" title="Edit" class="view" href="{{url('pembayaran', $p->pesanan_id)}}">
																<i class="fa fa-dolar-sign"></i>
															</a>
														</li>
														@endif
													</ul>
												</div>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
			                  </div>
			                  <!-- /.tab-pane -->
			                </div>
			                <!-- /.tab-content -->
			              </div><!-- /.card-body -->
			            </div>
			            <!-- ./card -->
			          </div>
			          <!-- /.col -->
			        </div>

				</div>

			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>
				@foreach($list_pesanan->sortBydesc('updated_at') as $p)
				<form action="{{url('konfirmasi-barang', $p->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$p->idp}}">
				<div class="modal fade" id="Modal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Produk Telah Diterima</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      <span>{{$p->nama}}</span>
				      <div class="form-group">
				      	<label for=""> Catatan </label>
				      	<input type="text" name="catatan" class="form-control">
				      </div>
				      <div class="form-group">
				      	<label for=""> Bukti Barang Telah Diterima </label>
				      	<input type="file" id="foto" onchange="readFoto(event)" name="bukti" class="form-control" accept="image/*" required>
				      	<img id="output" width="100%" alt="">
				      </div>
				      </div>
				      <div class="modal-footer">
						<button data-toggle="modal" data-target="#Modal{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Diterima" class="btn btn-success" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
							<i class="fa fa-check"></i>
						</button>
				      </div>
				    </div>
				  </div>
				</div>
				</form>
				@endforeach

<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')

<!-- JAVASCRIPTS -->
@include('Pembeli.Pembeli.template.js')
@push('script')
				<!-- JAVASCRIPTS -->
<script type="text/javascript">
    var readFoto= function(event) {
      var input = event.target;
      var reader = new FileReader();
      reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('output');
        output.src = dataURL;
      };
      reader.readAsDataURL(input.files[0]);
    };
 </script>
 @endpush
</body>

</html>