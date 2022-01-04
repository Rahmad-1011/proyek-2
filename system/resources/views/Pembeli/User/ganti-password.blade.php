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
                        <li class="breadcrumb-item"><a href="{{url('profile')}}">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ganti Password</li>
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
                		</div>
                		<div class="col-lg-4 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Profil</h2><!-- End .title mb-2 -->
                			<p class="mb-3">{{$user->nama}}</p>
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
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			@include('Pembeli.template.utils.notif')
                			<h2 class="title mb-1 mt-1">Ganti Password</h2><!-- End .title mb-2 -->
                				<form action="{{url('ganti-password')}}" method="post">
				                		@csrf
                				<div class="row">
                					<div class="col-sm-12">
                						<span>Password Lama</span>
								          <input type="Password" class="form-control" name="lama" @error('lama') is-invalid @enderror required>
								          @error('lama')
				                            <label>
				                                <div class="invalid-feedback" style="color: #FF0000">
				                                    {{$message}}
				                                </div>
				                            </label>
				                          @enderror
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-12">
                                        <span>Password Baru</span>
								          <input type="Password" class="form-control" name="baru" @error('baru') is-invalid @enderror required>
								          @error('baru')
				                            <label>
				                                <div class="invalid-feedback" style="color: #FF0000">
				                                    {{$message}}
				                                </div>
				                            </label>
				                          @enderror
                					</div><!-- End .col-sm-6 -->
                					<div class="col-sm-12">
                						<span>Konfirmasi Password Baru</span>
								          <input type="Password" class="form-control" name="konfirmasi" @error('konfirmasi') is-invalid @enderror required>
								          @error('konfirmasi')
				                            <label>
				                                <div class="invalid-feedback" style="color: #FF0000">
				                                    {{$message}}
				                                </div>
				                            </label>
				                          @enderror
                					</div>
                				</div><!-- End .row -->

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>Simpan</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                			</div>
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">
                </div><!-- End .container -->
            	<div id="map"></div><!-- End #map -->
            </div><!-- End .page-content -->
        </main>

	@include('Pembeli.template.footer')
	


    @include('Pembeli.template.js')
</body>
</html>

