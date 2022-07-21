@extends ('Toko.template.base')

@section('content')

	<div class="container">
		<div class="row"> 
			<div class="col-md-12 mt-3">
				<div class="card">
					<div  class="card-header">
						<h2><b>Data Produk</b></h2>
						<a href="{{url('Toko/produk/create')}}" class="btn float-right" style="background-color: #067D68; color: #fff;"><i class="fa fa-plus" style="font-size: 10pt"><b style="font-family: Arial; font-size: 10pt;"> Tambah Data</b></i></a>
					</div>
					<div class="card card-solid">
				        <div class="card-body pb-0">
				          <div class="row d-flex align-items-stretch">
				          	@foreach($list_produk as $produk)
				            <div class="col-sm-6 col-md-4 d-flex mb-3 align-items-stretch">
				              <div class="card shadow border" style="width: 100%">
				                <div class="card-header text-muted border-bottom-0">
				                  =
				                </div>
				                <div class="card-body pt-0">
				                  <div class="row">
				                    <div class="col-7">
				                      <h2 class="lead"><b>{{$produk->nama}}</b></h2>
				                      <ul class="ml-4 mb-2 fa-ul text-muted">
				                        <li class="small"><span class="fa-li"><i class="fas fa fa-shopping-basket"></i></span> Stok: {{$produk->stok}}</li>
				                        <li class="small"><span class="fa-li"><i class="fa fa-tag"></i></span> {{$produk->kategori->nama}}</li>
				                        <li><span class="fa-li" style="font-size: 12pt;"><i class="fa fa-money"></i></span> Harga: Rp. {{number_format($produk->harga)}}</li>
				                      </ul>
				                      <?php 
												$komentars = \App\Models\Komentar::where('produk_id', $produk->id)->get();
												$jumlah_bintang = \App\Models\Komentar::where('produk_id', $produk->id)->sum('bintang');

												if($komentars->count() > 0){
													$bintang = $jumlah_bintang/$komentars->count();
												}
												else{
													$bintang = 0;
												}
												 ?>
												@php
													$b = number_format($bintang)
												@endphp
												<span style="font-size: 10pt;">{{$komentars->count()}} Penilaian</span>
												<ul class="list-inline">
													@for($i =1; $i<= $b; $i++)
														<li class="list-inline-item"><i class="fa fa-star" style="color: #ffe400"></i></li>
													@endfor
													@for($j = $b+1; $j<=5; $j++)
														<li class="list-inline-item"><i class="fa fa-star"></i></li>
													@endfor
												</ul>
				                    </div>
				                    <div class="col-5 text-center">
								        @if(!empty($produk->foto))
				    						<img style="width: 90px; height: 90px; border-radius: 10px" src="{{url("public/$produk->foto")}}" class="img-fluid">
				    					@else
				    						<img style="width: 90px; height: 90px; border-radius: 50%;" src="{{url('public')}}/Admin/assets/img/user.png">
				    					@endif
				                    </div>
				                  </div>
				                </div>
				                <div class="card-footer">
				                	<div class="text-right">
				                    	<div class="btn-group">
				                    	<button class="btn btn-info mr-2" data-toggle="modal" data-target="#exampleModal{{$produk->id}}" style="border-radius: 5px;"><i class="fa fa-comments"></i> <span class="badge badge-danger"> {{$produk->komentar->count()}} </span></button>
										<a href="{{url('Toko/produk', $produk->id)}}" class="btn btn-primary mr-1" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
										<a href="{{url('Toko/produk', $produk->id)}}/edit" class="btn btn-warning mr-1" style="width: 40px; border-radius: 5px;"><i class="fa fa-edit"></i></a>
										@include('Toko.template.utils.delete', ['url'=>url('Toko/produk', $produk->id)])
									</div>
				                  	</div>
				                </div>
				              </div>
				            </div>
				            @endforeach
				          </div>
				          {!! $list_produk->links() !!}
				        </div>
				        <!-- /.card-body -->
				        <!-- /.card-footer -->
				    </div>
				</div>
			</div>
		</div>
	</div>
@foreach($list_produk as $produk)
<?php 
 $komentars = \App\Models\Komentar::where('produk_id', $produk->id)->get();
 ?>
<div class="modal fade" id="exampleModal{{$produk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Komentar untuk : {{$produk->nama}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card">
    				@foreach($komentars as $komentar)
    				<div class="row mt-3 ml-2 mr-2">
	    				<div class="col-md-1">
	    					@if(!empty($komentar->user->foto))
	    						<img style="width: 50px; height: 50px; border-radius: 50%;" src="{{url('public')}}/{{$komentar->user->foto}}" class="img-fluid">
	    					@else
	    						<img style="width: 50px; height: 50px; border-radius: 50%;" src="{{url('public')}}/Admin/assets/img/user.png">
	    					@endif
	    				</div>
	    				<div class="col-md-11">
		    				<span><b>{{$komentar->user->nama}}</b>, {{$komentar->updated_at->diffForHumans()}}
		    					<ul class="list-inline">
													@for($i =1; $i<= $komentar->bintang; $i++)
														<li class="list-inline-item"><i class="fa fa-star" style="color: #ffe400"></i></li>
													@endfor
													@for($j = $komentar->bintang+1; $j<=5; $j++)
														<li class="list-inline-item"><i class="fa fa-star"></i></li>
													@endfor
												</ul>
		    				</span>
			    			<div class="card ml-2 mt-2" style="border: #0E6655 solid 1px">
			    				<p style="padding-left: 10px; margin-top: auto; margin-bottom: auto;">{{$komentar->konten}}</p>
			    			</div>
		    			</div>
	    			</div>
	    			@endforeach
	    		</div>
    		</div>
    	</div>
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