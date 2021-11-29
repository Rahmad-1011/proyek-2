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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/beranda')}}">Home</a></li>
				  <li class="active">Profile</li>
				</ol>
			</div>
				@include('Pembeli.template.utils.notif')
					<section class="content">
				      <div class="container-fluid">
				        <div class="row">
				        	<div class="col-md-3">
				            <!-- Profile Image -->
					            <div class="card card-primary card-outline">
					              <div class="card-body box-profile">
					                <div class="text-center">
					                  	@if(!empty($user->foto))
						                	<img style="width: 100%; height: 280px;" src="{{url("public/$user->foto")}}" class="img-fluid">
						               	@else
						                	<img src="{{url('public')}}/Admin/assets/img/user.png">
						             	@endif
					                </div>

					                <h3 class="profile-username text-center">{{$user->nama}}</h3>

					                <p class="text-muted text-center">{{$user->email}}</p>
					                <form action="{{url('profile')}}" method="post" enctype="multipart/form-data">
					                	@csrf
					                	<div class="form-group">
											<label for="" class="control-label"><i class="fa fa-pencil-alt"></i> Edit Foto Profil </label>
											<input type="file" class="form-control" name="foto" accept="image/*">
										</div>

					              <!-- /.card-body -->
					            </div>
					          </div>
				      		</div>
				      		<div class="col-md-5">
					            <div class="card card-primary card-outline">
					              <div class="card-body box-profile">
					                <p class="text">No HP : {{$user->no_hp}}</p>

					                <p class="text"> Alamat : {{$user->alamat}}</p>
					            </div>
					          </div>
				      		</div>
				          <!-- /.col -->
				          <div class="col-md-4">
				            <div class="card">
				              <div class="card-header p-2">
				              	<h3>Edit Profile</h3>
				              </div>
				              <div class="card-body">
				                <div class="tab-content">
							        <div class="input-group" style="margin-bottom: 20px; width: 100%;">
							          <span>Nama</span>
							          <input type="text" class="form-control" name="nama" value="{{$user->nama}}">
							        </div>
							        <div class="input-group" style="margin-bottom: 20px; width: 100%;">
							          <span>No. Handphone</span>
							          <input type="text" class="form-control" name="no_hp" value="{{$user->no_hp}}">
							        </div>
							        <div class="input-group" style="margin-bottom: 20px; width: 100%;">
							        	<span>Alamat</span>
							          <textarea class="form-control" name="alamat" value="{{$user->alamat}}"></textarea>
							        </div>
							        <div class="input-group" style="margin-bottom: 20px; width: 100%;">
							        	<span>Email</span>
							          <input type="email" class="form-control" name="email" value="{{$user->email}}">
							        </div>
							        <div class="input-group" style="margin-bottom: 20px; width: 100%;">
							        	<span>Password Baru *</span>
							          <input type="password" class="form-control" name="password" placeholder="Password">
							        </div>
							        <div class="row">
							          <!-- /.col -->
							          <div class="col-md-4">
							            <button type="submit" class="btn btn-primary btn-block">Edit</button>
							          </div>
							          <!-- /.col -->
							        </div>
							      </form>
				                </div>
				                <!-- /.tab-content -->
				              </div><!-- /.card-body -->
				            </div>
				            <!-- /.nav-tabs-custom -->
				          </div>
				          <!-- /.col -->
				        </div>
				        <!-- /.row -->
				      </div><!-- /.container-fluid -->
    				</section>
		</div>
	</section> <!--/#cart_items-->

	@include('Pembeli.template.footer')
	


    @include('Pembeli.template.js')
</body>
</html>