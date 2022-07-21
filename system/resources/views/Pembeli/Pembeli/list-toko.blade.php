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
@include('Pembeli.Pembeli.template.cari')
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result">
					<h2>Daftar Toko Oleh-oleh Khas Ketapang</h2>
				</div>
			</div>
		</div>
		<div class="row">
      <div class="container"> 
      <div class="col-md-12">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
          	@foreach($list_toko as $user)
            <div class="col-sm-6 col-md-4 d-flex mb-5 align-items-stretch">
              <div class="card bg-light shadow" style="width: 100%">
                <div class="card-header text-muted border-bottom-0">
                  =
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$user->nama}}</b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa fa-building"></i></span> Alamat: {{$user->alamat}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa fa-phone"></i></span> Telepon: {{$user->no_hp}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      	<a href="{{url('toko', $user->id)}}">
				                @if(!empty($user->foto))
    									   <img style="width: 90px; height: 90px; border-radius: 50%;" src="{{url("public/$user->foto")}}" class="img-fluid">
    								    @else
    									   <img style="width: 90px; height: 90px; border-radius: 50%;" src="{{url('public')}}/Admin/assets/img/user.png">
    								    @endif
    				        </a>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="{{url('toko', $user->id)}}" class="btn btn-sm btn-primary border-0 shadow" style="background-color: #117A65">
                      <i class="fa fa-user"></i> Lihat Toko
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          {!! $list_toko->links() !!}
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
      </div>
       </div>
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')

<!-- JAVASCRIPTS -->
@include('Pembeli.Pembeli.template.js')

</body>

</html>