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
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			@include('Pembeli.Pembeli.template.side-profil')
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message shadow" style="border-radius: 20px;">
					<h2>Profile</h2>
					<p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
				</div>
				<!-- Edit Personal Info -->
				<form action="{{url('profile')}}" method="post" enctype="multipart/form-data">
				@csrf
                @method("PUT")
				<div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="widget personal-info shadow" style="border-radius: 20px; ">
								<h3 class="widget-header user">Edit Informasi Pribadi</h3>
                                  
									<!-- Last Name -->
									<div class="form-group">
										<label for="name">Nama</label>
										<input type="text" class="form-control" name="nama" value="{{$user->nama}}" placeholder="{{$user->nama}}" id="name">
									</div>
									<!-- Email -->
									<div class="form-group">
										<label for="name">Email</label>
										<input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="{{$user->email}}" id="name">
									</div>
									<!-- Nomor Telepon -->
									<div class="form-group">
										<label for="comunity-name">Nomor Telepon</label>
										<input type="text" class="form-control" name="no_hp" value="{{$user->no_hp}}" placeholder="{{$user->no_hp}}" id="comunity-name">
									</div>
									<!-- Submit button -->
									<button type="Submit" class="btn btn-transparent shadow" style="border-radius: 20px;">Simpan Perubahan</button>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<!-- Change Password -->
							<div class="widget change-password shadow" style="border-radius: 20px;">
									<!-- File chooser -->
									<center>
										<div class="profile-thumb">
											<img id="output" src="{{url("public/$user->foto")}}" alt="" class="rounded-circle" style="width: 50%">
										</div>
										<div class="form-group choose-file d-inline-flex">
											<input type="file" id="foto" onchange="readFoto(event)" class="form-control-file mt-2 pt-1" name="foto" accept="image/*">
										</div>
									</center>
							</div>
						</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->

@include('Pembeli.Pembeli.template.footer')

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
@include('Pembeli.Pembeli.template.js')

</body>

</html>