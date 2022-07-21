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
			                  		@foreach($pesanans->sortByDesc('updated_at')->sortBy('status') as $p)
			                  			<?php 
											$pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $p->id)->get();
											$foto = \App\Models\PesananDetail::where('pesanan_id', $p->id)->first();
										?>
			                  				<div class="card w-100 mb-3 shadow">
												<div class="card-header">
													<span>Tanggal pesanan {!! date('d M Y', strtotime($p->tanggal)) !!}</span>

													@if($p->status == 2)
													<span class="badge badge-danger float-right">Belum dibayar</span>
													@elseif($p->status == 3)
													<span class="badge badge-warning float-right">Sedang dikemas</span>
													@elseif($p->status == 4)
													<span class="badge badge-success float-right">Sedang dikirim</span>
													@elseif($p->status >= 5)
													<span class="badge badge-info float-right">Sudah Diterima</span>
													@endif

												</div>
											  		<div class="card-body">
											  			<div class="row">
											  				<div class="col-md-3 col-sm-3">
											  					<img src="{{url('public')}}/{{$foto->produk->foto}}" alt="" width="100%">
											  				</div>
											  				<div class="col-md-9 col-sm-9">
											  					<tr>
											  						<td>Produk yang dipesan</td>
											  						<td>:</td>
																	@foreach($pesanan_details as $pesanan_detail)
											  						<td><b> {{$pesanan_detail->produk->nama}},</b></td>
											  						@endforeach
											  					</tr><br>
											  					<tr>
											  						<td>Total Harga</td>
											  						<td>:</td>
											  						<td><b> <span style="font-size: 8pt">Rp</span>{{number_format($p->total_harga)}}</b></td>
											  					</tr><br>
											  					<tr>
											  						<td>Nama Penerima</td>
											  						<td>:</td>
											  						<td><b> {{$p->nama_penerima}}</b></td>
											  					</tr>
											  				</div>
											  			</div>
											  		</div>
											  		@if($p->status == 2)
											    	<div class="card-footer">
											    		<a class="btn btn-danger float-right" data-toggle="tooltip" data-placement="top" title="Bayar" class="view" href="{{url('pembayaran', $p->id)}}" style="width: 30%; height: 40px; padding: 8px">
															<i class="fa fa-money" style="margin: auto;"></i>
														</a>
											    	</div>
											    	@elseif($p->status >= 4)
											    	<div class="card-footer">
											    		<button data-toggle="modal" data-target="#detail{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Info Pesanan" class="btn btn-success float-right" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-info"></i>
																</button>
											    	</div>
											    	@endif
											</div>

									@endforeach
								
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_belumbayar">
			                  	@foreach($pesanans->sortByDesc('updated_at')->sortBy('status') as $p)
			                  		@if($p->status==2)
			                  			<?php 
											$pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $p->id)->get();
											$foto = \App\Models\PesananDetail::where('pesanan_id', $p->id)->first();
										?>
			                  				<div class="card w-100 mb-3 shadow">
												<div class="card-header">
													<span>Tanggal pesanan {!! date('d M Y', strtotime($p->tanggal)) !!}</span>

													@if($p->status == 2)
													<span class="badge badge-danger float-right">Belum dibayar</span>
													@elseif($p->status == 3)
													<span class="badge badge-warning float-right">Sedang dikemas</span>
													@elseif($p->status == 4)
													<span class="badge badge-success float-right">Sedang dikirim</span>
													@elseif($p->status >= 5)
													<span class="badge badge-info float-right">Sudah Diterima</span>
													@endif

												</div>
											  		<div class="card-body">
											  			<div class="row">
											  				<div class="col-md-3 col-sm-3">
											  					<img src="{{url('public')}}/{{$foto->produk->foto}}" alt="" width="100%">
											  				</div>
											  				<div class="col-md-9 col-sm-9">
											  					<tr>
											  						<td>Produk yang dipesan</td>
											  						<td>:</td>
																	@foreach($pesanan_details as $pesanan_detail)
											  						<td><b> {{$pesanan_detail->produk->nama}},</b></td>
											  						@endforeach
											  					</tr><br>
											  					<tr>
											  						<td>Total Harga</td>
											  						<td>:</td>
											  						<td><b> <span style="font-size: 8pt">Rp</span>{{number_format($p->total_harga)}}</b></td>
											  					</tr><br>
											  					<tr>
											  						<td>Nama Penerima</td>
											  						<td>:</td>
											  						<td><b> {{$p->nama_penerima}}</b></td>
											  					</tr>
											  				</div>
											  			</div>
											  		</div>
											  		@if($p->status == 2)
											    	<div class="card-footer">
											    		<a class="btn btn-danger float-right" data-toggle="tooltip" data-placement="top" title="Bayar" class="view" href="{{url('pembayaran', $p->id)}}" style="width: 30%; height: 40px; padding: 8px">
															<i class="fa fa-money" style="margin: auto;"></i>
														</a>
											    	</div>
											    	@elseif($p->status >= 4)
											    	<div class="card-footer">
											    		<button data-toggle="modal" data-target="#detail{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Info Pesanan" class="btn btn-success float-right" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-info"></i>
																</button>
											    	</div>
											    	@endif
											</div>
										@endif
									@endforeach
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_dikemas">
			                    @foreach($pesanans->sortByDesc('updated_at')->sortBy('status') as $p)
			                  		@if($p->status==3)
			                  			<?php 
											$pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $p->id)->get();
											$foto = \App\Models\PesananDetail::where('pesanan_id', $p->id)->first();
										?>
			                  				<div class="card w-100 mb-3 shadow">
												<div class="card-header">
													<span>Tanggal pesanan {!! date('d M Y', strtotime($p->tanggal)) !!}</span>

													@if($p->status == 2)
													<span class="badge badge-danger float-right">Belum dibayar</span>
													@elseif($p->status == 3)
													<span class="badge badge-warning float-right">Sedang dikemas</span>
													@elseif($p->status == 4)
													<span class="badge badge-success float-right">Sedang dikirim</span>
													@elseif($p->status >= 5)
													<span class="badge badge-info float-right">Sudah Diterima</span>
													@endif

												</div>
											  		<div class="card-body">
											  			<div class="row">
											  				<div class="col-md-3 col-sm-3">
											  					<img src="{{url('public')}}/{{$foto->produk->foto}}" alt="" width="100%">
											  				</div>
											  				<div class="col-md-9 col-sm-9">
											  					<tr>
											  						<td>Produk yang dipesan</td>
											  						<td>:</td>
																	@foreach($pesanan_details as $pesanan_detail)
											  						<td><b> {{$pesanan_detail->produk->nama}},</b></td>
											  						@endforeach
											  					</tr><br>
											  					<tr>
											  						<td>Total Harga</td>
											  						<td>:</td>
											  						<td><b> <span style="font-size: 8pt">Rp</span>{{number_format($p->total_harga)}}</b></td>
											  					</tr><br>
											  					<tr>
											  						<td>Nama Penerima</td>
											  						<td>:</td>
											  						<td><b> {{$p->nama_penerima}}</b></td>
											  					</tr>
											  				</div>
											  			</div>
											  		</div>
											  		@if($p->status == 2)
											    	<div class="card-footer">
											    		<a class="btn btn-danger float-right" data-toggle="tooltip" data-placement="top" title="Bayar" class="view" href="{{url('pembayaran', $p->id)}}" style="width: 30%; height: 40px; padding: 8px">
															<i class="fa fa-money" style="margin: auto;"></i>
														</a>
											    	</div>
											    	@elseif($p->status >= 4)
											    	<div class="card-footer">
											    		<button data-toggle="modal" data-target="#detail{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Info Pesanan" class="btn btn-success float-right" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-info"></i>
																</button>
											    	</div>
											    	@endif
											</div>
										@endif
									@endforeach
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_dikirim">
			                    @foreach($pesanans->sortByDesc('updated_at')->sortBy('status') as $p)
			                  		@if($p->status==4)
			                  			<?php 
											$pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $p->id)->get();
											$foto = \App\Models\PesananDetail::where('pesanan_id', $p->id)->first();
										?>
			                  				<div class="card w-100 mb-3 shadow">
												<div class="card-header">
													<span>Tanggal pesanan {!! date('d M Y', strtotime($p->tanggal)) !!}</span>

													@if($p->status == 2)
													<span class="badge badge-danger float-right">Belum dibayar</span>
													@elseif($p->status == 3)
													<span class="badge badge-warning float-right">Sedang dikemas</span>
													@elseif($p->status == 4)
													<span class="badge badge-success float-right">Sedang dikirim</span>
													@elseif($p->status >= 5)
													<span class="badge badge-info float-right">Sudah Diterima</span>
													@endif

												</div>
											  		<div class="card-body">
											  			<div class="row">
											  				<div class="col-md-3 col-sm-3">
											  					<img src="{{url('public')}}/{{$foto->produk->foto}}" alt="" width="100%">
											  				</div>
											  				<div class="col-md-9 col-sm-9">
											  					<tr>
											  						<td>Produk yang dipesan</td>
											  						<td>:</td>
																	@foreach($pesanan_details as $pesanan_detail)
											  						<td><b> {{$pesanan_detail->produk->nama}},</b></td>
											  						@endforeach
											  					</tr><br>
											  					<tr>
											  						<td>Total Harga</td>
											  						<td>:</td>
											  						<td><b> <span style="font-size: 8pt">Rp</span>{{number_format($p->total_harga)}}</b></td>
											  					</tr><br>
											  					<tr>
											  						<td>Nama Penerima</td>
											  						<td>:</td>
											  						<td><b> {{$p->nama_penerima}}</b></td>
											  					</tr>
											  				</div>
											  			</div>
											  		</div>
											  		@if($p->status == 2)
											    	<div class="card-footer">
											    		<a class="btn btn-danger float-right" data-toggle="tooltip" data-placement="top" title="Bayar" class="view" href="{{url('pembayaran', $p->id)}}" style="width: 30%; height: 40px; padding: 8px">
															<i class="fa fa-money" style="margin: auto;"></i>
														</a>
											    	</div>
											    	@elseif($p->status >= 4)
											    	<div class="card-footer">
											    		<button data-toggle="modal" data-target="#detail{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Info Pesanan" class="btn btn-success float-right" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-info"></i>
																</button>
											    	</div>
											    	@endif
											</div>
										@endif
									@endforeach
			                  </div>

			                  <!-- /.tab-pane -->
			                  <div class="tab-pane" id="tab_selesai">
			                    @foreach($pesanans->sortByDesc('updated_at')->sortBy('status') as $p)
			                  		@if($p->status>=5)
			                  			<?php 
											$pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $p->id)->get();
											$foto = \App\Models\PesananDetail::where('pesanan_id', $p->id)->first();
										?>
			                  				<div class="card w-100 mb-3 shadow">
												<div class="card-header">
													<span>Tanggal pesanan {!! date('d M Y', strtotime($p->tanggal)) !!}</span>

													@if($p->status == 2)
													<span class="badge badge-danger float-right">Belum dibayar</span>
													@elseif($p->status == 3)
													<span class="badge badge-warning float-right">Sedang dikemas</span>
													@elseif($p->status == 4)
													<span class="badge badge-success float-right">Sedang dikirim</span>
													@elseif($p->status >= 5)
													<span class="badge badge-info float-right">Sudah Diterima</span>
													@endif

												</div>
											  		<div class="card-body">
											  			<div class="row">
											  				<div class="col-md-3 col-sm-3">
											  					<img src="{{url('public')}}/{{$foto->produk->foto}}" alt="" width="100%">
											  				</div>
											  				<div class="col-md-9 col-sm-9">
											  					<tr>
											  						<td>Produk yang dipesan</td>
											  						<td>:</td>
																	@foreach($pesanan_details as $pesanan_detail)
											  						<td><b> {{$pesanan_detail->produk->nama}},</b></td>
											  						@endforeach
											  					</tr><br>
											  					<tr>
											  						<td>Total Harga</td>
											  						<td>:</td>
											  						<td><b> <span style="font-size: 8pt">Rp</span>{{number_format($p->total_harga)}}</b></td>
											  					</tr><br>
											  					<tr>
											  						<td>Nama Penerima</td>
											  						<td>:</td>
											  						<td><b> {{$p->nama_penerima}}</b></td>
											  					</tr>
											  				</div>
											  			</div>
											  		</div>
											  		@if($p->status == 2)
											    	<div class="card-footer">
											    		<a class="btn btn-danger float-right" data-toggle="tooltip" data-placement="top" title="Bayar" class="view" href="{{url('pembayaran', $p->id)}}" style="width: 30%; height: 40px; padding: 8px">
															<i class="fa fa-money" style="margin: auto;"></i>
														</a>
											    	</div>
											    	@elseif($p->status >= 4)
											    	<div class="card-footer">
											    		<button data-toggle="modal" data-target="#detail{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Info Pesanan" class="btn btn-success float-right" style="font-size: 12pt; padding: 10px; border-radius: 50%; height: 50px; width: 50px">
																	<i class="fa fa-info"></i>
																</button>
											    	</div>
											    	@endif
											</div>
										@endif
									@endforeach
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

<!-- Modal Detail Pesanan -->
@foreach($pesanans as $p)
<?php 
	$pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $p->id)->get();
?>
<div class="modal fade" id="detail{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	@foreach($pesanan_details as $pesanan_detail)
        <div class="card mb-4 shadow">
        	<div class="row">
        		<div class="col-md-3"><img src="{{url('public')}}/{{$pesanan_detail->produk->foto}}" alt="" width="100%" height="150px"></div>
        		<div class="col-md-7">
        			<ul>
        				<li>Nama Produk : {{$pesanan_detail->produk->nama}}</li>
        				<li>Jumlah Pesanan : {{$pesanan_detail->jumlah}} pcs</li>
        				<li>Jumlah Harga : <span style="font-size: 8pt">Rp</span>{{number_format($pesanan_detail->jumlah_harga)}}</li>
        				<li>Nama Toko : {{$pesanan_detail->produk->penjual->nama}}</li>
        				<li>Nama Penerima : {{$p->nama_penerima}}</li>
        			</ul>
        		</div>
        		<div class="col-md-2">
        			@if($pesanan_detail->status == 4)
        			<button data-toggle="modal" data-toggle="tooltip" data-target="#Modal{{$pesanan_detail->id}}" data-placement="top" title="Diterima" class="btn btn-success float-right" style="font-size: 12pt; padding: 10px; height: 50px; width: 50px;">
						<i class="fa fa-check"></i>
					</button>
					@endif
				</div>
        	</div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endforeach

			@foreach($pesanans as $p)
			<?php 
				$pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $p->id)->get();
			?>
				@foreach($pesanan_details as $pesanan_detail)
				<div class="modal fade" id="Modal{{$pesanan_detail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<form action="{{url('konfirmasi-barang', $pesanan_detail->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="idpd" value="{{$pesanan_detail->id}}">
				<input type="hidden" name="produk_id" value="{{$pesanan_detail->produk_id}}">
				<input type="hidden" name="id" value="{{$pesanan_detail->pesanan_id}}">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Produk Telah Diterima</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      <span>Nama Produk : {{$pesanan_detail->produk->nama}}</span>
				      <div class="form-group">
				      	<label for=""> Catatan </label>
				      	<input type="text" name="konten" class="form-control">
				      </div>
				    <div class="form-group">
				    	<label for=""> Beri Rating </label>
				      	<div class="form-check">
						  <input class="form-check-input" type="radio" name="bintang" id="exampleRadios1" value="1" checked>
						  <label class="form-check-label" for="exampleRadios1">
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star-o"></i>
						    <i class="fa fa-star-o"></i>
						    <i class="fa fa-star-o"></i>
						    <i class="fa fa-star-o"></i>
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bintang" id="exampleRadios2" value="2">
						  <label class="form-check-label" for="exampleRadios2">
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star-o"></i>
						    <i class="fa fa-star-o"></i>
						    <i class="fa fa-star-o"></i>
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bintang" id="exampleRadios3" value="3">
						  <label class="form-check-label" for="exampleRadios3">
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star-o"></i>
						    <i class="fa fa-star-o"></i>
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bintang" id="exampleRadios4" value="4">
						  <label class="form-check-label" for="exampleRadios4">
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star-o"></i>
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bintang" id="exampleRadios5" value="5">
						  <label class="form-check-label" for="exampleRadios5">
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						    <i class="fa fa-star"></i>
						  </label>
						</div>
					</div>
				      <div class="form-group">
				      	<label for=""> Bukti Barang Telah Diterima </label>
				      	<input type="file" id="foto" onchange="readFoto(event)" name="bukti" class="form-control" accept="image/*" required>
				      	<img id="output" width="100%" alt="">
				      </div>
				      </div>
				      <div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="fa fa-comment"></i></button>
				      </div>
				    </div>
				  </div>
				</div>
				</form>
				@endforeach
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