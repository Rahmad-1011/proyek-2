<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Marketplace Oleh-oleh Khas Ketapang</title>
    @include('Pembeli.template.css')
</head><!--/head-->

<body>
	@include('Pembeli.template.header')

		<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-2">
                			<div class="row justify-content-center">
                				@if(!empty($user->foto))
						           <img style="width: 200px; height: 200px; border-radius: 50%;" src="{{url("public/$user->foto")}}" class="img-fluid">
						          @else
						           <img src="{{url('public')}}/Admin/assets/img/user.png">
						        @endif
                			</div>
                			<div class="row">
                				<form action="{{url('profile')}}" method="post" class="contact-form mb-3" enctype="multipart/form-data">
                					@csrf
                				<div class="form-group">
									<label for="" class="control-label justify-content-center" style="margin-left: 23px">Edit Foto Profil </label>
									<input type="file" class="form-control" name="foto" accept="image/*">
								</div>
                			</div>
                		</div>
                		<div class="col-lg-4 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Profil</h2><!-- End .title mb-2 -->
                			<p class="mb-3"><b>{{$user->nama}}</b></p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>Informasi Akun</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							{{$user->alamat}}
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:#">{{$user->no_hp}}</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
                								<a href="mailto:#">{{$user->email}}</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->
                					<div class="contact-info" style="margin-left: 20px;">
                						<?php 
						                  $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',1)->first();
						                  if(!empty($pesanan_utama)){
						                    $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
						                  }
						                 ?>
                                        <a href="{{url('pemesanan')}}" style="color: #fff">
							          	<div class="btn btn-primary btn-block"> Pesanan Anda @if(!empty($notif))
						                    <span class="badge badge-primary">{{$notif}}</span>
						                    @endif
					                	</div>
                                        </a>
                					</div>
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			@include('Pembeli.template.utils.notif')
                			<h2 class="title mb-1 mt-1">Perbarui Informasi Anda ?</h2><!-- End .title mb-2 -->
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" class="form-control" id="cname" name="nama" value="{{$user->nama}}" placeholder="Nama Lengkap *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input type="email" class="form-control" id="cemail" name="email" value="{{$user->email}}" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">No. Handphone</label>
                						<input type="tel" class="form-control" id="cphone" name="no_hp" value="{{$user->no_hp}}" placeholder="No. Handphone">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Alamat</label>
                						<textarea class="form-control" name="alamat" value="{{$user->alamat}}" placeholder="Alamat"></textarea>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>Simpan</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                			<div class="row">
                				<div class="col-sm-6 mt-2">
                				<a href="{{url('ganti-password')}}">
	                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
	                					<span>Ganti Password ?</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
                				</a>
                				</div>
                                <div class="col-sm-6 mt-2">
                                <a href="{{url('maok/logout')}}">
                                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                        <span>Logout</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </a>
                                </div>
                			</div>
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main>

	@include('Pembeli.template.footer')
	


    @include('Pembeli.template.js')
</body>
</html>

