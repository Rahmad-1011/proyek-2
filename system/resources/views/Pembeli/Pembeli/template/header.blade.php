<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="index.html">
						<img src="{{url('public')}}/Pembeli/images/LogoM.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item {{request()->is('beranda*') ? 'active' : ''}}">
								<a class="nav-link" href="{{url('beranda')}}">Beranda</a>
							</li>
							<li class="nav-item {{request()->is('produk*') ? 'active' : ''}}">
								<a class="nav-link" href="{{url('produk')}}">Produk</a>
							</li>
							<li class="nav-item {{request()->is('toko*') ? 'active' : ''}}">
								<a class="nav-link" href="{{url('toko')}}">Daftar Toko</a>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">

							<li class="nav-item">
							@if(Auth::user())
							<?php 
	                            $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
	                            if(!empty($pesanan_utama)){
	                              $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
	                            }
                           	?>
                           	@endif
								<a class="nav-link text-white login-button shadow" href="{{url('keranjang')}}" style="border-radius: 20px; background-color: #117A65"><i class="fa fa-cart-plus"></i> Keranjang 
										@if(!empty($notif))
										<span class="badge badge-danger">
			                            	{{$notif}}
			                            </span>
			                            @else
			                            	
			                            @endif
								</a>

							</li>

							<li class="nav-item">

								@if(!Auth::user())
								<a class="nav-link text-black add-button" href="{{url('maok/login')}}" style="color: #117A65; background-color: #fff"><i class="fa fa-user"></i> Silahkan Login</a>
								@else

								<a class="nav-link text-black add-button" href="{{url('profile/pesanan-saya')}}" style="color: #117A65; background-color: #fff"><i class="fa fa-user"></i> {{Auth::user()->nama}}</a>

								@endif
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>