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
	@include('Pembeli.Guest.template.header')	
	<section>
		<div class="container">
			<div class="row">
				@include('Pembeli.Guest.template.sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title">Toko Oleh-oleh Khas Ketapang</h2>
						@foreach($list_toko as $user)
						<div class="col-sm-3">
			              <div class="product-image-wrapper">
			                <div class="single-products">
			                    <div class="productinfo text-center">
			                      @if(!empty($user->foto))
						            <img src="{{url("public/$user->foto")}}" class="img-fluid" style="width: 100%; height: 180px; border-radius: 50%;">
						           @else
						            <img src="{{url('public')}}/Admin/assets/img/user.png">
						         @endif
			                      <h2 style="font-size: 13pt;">{{$user->nama}}</h2>
			                      <p>{{$user->no_hp}}</p>
			                    </div>
			                    <div class="product-overlay">
			                      <div class="overlay-content">
			                        <h2>{{$user->nama}}</h2>
			                        <p> {{$user->no_hp}} </p>
			                        <a href="{{url('maok/toko', $user->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cek Disini</a>
			                      </div>
			                    </div>
			                </div>
			              </div>
			            </div>
						@endforeach
					</div><!--features_items-->
					<div class="row">
						<div class="col-md-12">
							<div class="d-flex pagination" style="margin-left: 340px;">
								{!! $list_toko->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	@include('Pembeli.template.footer')
	

  
    @include('Pembeli.template.js')
</body>
</html>