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
					<h2>Ganti Password</h2>
					<p>Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</p>
					
				</div>
				<!-- Edit Personal Info -->
				<div class="row">
						<div class="col-md-12 col-lg-12">
							@include('Admin.template.utils.notif')
							<div class="widget personal-info shadow" style="border-radius: 20px; ">
								<h3 class="widget-header user">Edit Informasi Pribadi</h3>
								<form action="{{url('profile/ganti-password')}}" method="POST">
									@csrf
									<!-- First Name -->
									<div class="form-group">
										<label for="username">Password Lama</label>
										<input type="password" name="lama" class="form-control" id="username" required>
									</div>
									<!-- Last Name -->
									<div class="form-group">
										<label for="name">Password Baru</label>
										<input type="password" name="baru" class="form-control" id="name">
									</div>
									<!-- Email -->
									<div class="form-group">
										<label for="name">Konfirmasi Password Baru</label>
										<input type="password" name="konfirmasi" class="form-control" id="name">
									</div>
									<!-- Submit button -->
									<button type="submit" class="btn btn-transparent shadow" style="border-radius: 20px;">Simpan Perubahan</button>
								</form>
							</div>
						</div>
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