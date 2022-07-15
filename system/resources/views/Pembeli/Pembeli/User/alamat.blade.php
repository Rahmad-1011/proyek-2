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
					<h2>Alamat Saya
						<button type="button" class="btn btn-primary shadow border-0" data-toggle="modal" data-target="#alamatbaru" style="border-radius: 20px; background-color: #117A65; float: right; color: #fff">
						  Tambah Alamat
						</button>
					</h2>
				</div>


				<!-- Button trigger modal -->
				

				<!-- Modal -->
				<div class="modal fade" id="alamatbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
						<form action="{{url('profile/alamat')}}" method="post">
							@csrf
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Alamat Baru</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				    	<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="widget personal-info shadow" style="border-radius: 20px; ">
										<div class="row">
											<!-- First Name -->
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" class="form-control" id="name" name="nama_lengkap" placeholder="Nama Lengkap" required>
												</div>
											</div>
											<!-- Last Name -->
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" class="form-control" id="telepon" name="no_hp" placeholder="Nomor Telepon" required>
												</div>
											</div>
										</div>
										<!-- Email -->
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="alamat" placeholder="Alamat Lengkap" required>
										</div>
										<!-- Kode Pos -->
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="kode_pos" placeholder="Kode Pos" required>
										</div>
										<!-- Nomor Telepon -->
										<div class="form-group">
											<input type="text" class="form-control" id="comunity-name" name="detail_lokasi" placeholder="Detail Lokasi">
										</div>
										<!-- Submit button -->
								</div>
							</div>
						</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary shadow" data-dismiss="modal" style="border-radius: 20px;">Lain Kali</button>
				        <button type="submit" class="btn btn-primary shadow" style="background-color: #117A65; border-radius: 20px;">Simpan Perubahan</button>
				      </div>
						</form>
				    </div>
				  </div>
				</div>


				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
					@include('Pembeli.template.utils.notif')
						<div class="widget dashboard-container my-adslist">

							@foreach($list_alamat as $alamat)
							<div class="card mt-3 border-0 shadow" style="border-radius: 10px">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-10 col-md-10">
											<h3 class="title">{{$alamat->nama_lengkap}}</h3><br>
											<span class="add-id"><strong>Alamat : </strong> {{$alamat->alamat}}</span><br>
											<span><strong>Kode Pos : </strong> {{$alamat->kode_pos}}</span><br>
											<span class="status active"><strong>Nomor Telepon : </strong> {{$alamat->no_hp}}</span><br>
											<span class="location"><strong>Detail : </strong> {{$alamat->detail_lokasi}}</span>
										</div>
										<div class="col-lg-2 col-md-2">
											<form action="{{url('profile/alamat', $alamat->id)}}" method="post" class="delete" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
														@csrf
														@method("delete")
												<button class="delete border-0" style="border-radius: 50%; float: right;"><i class="fa fa-times" style="color: red"></i></button>
											</form>
										</div>
									</div>
								</div>
							</div>
							@endforeach

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