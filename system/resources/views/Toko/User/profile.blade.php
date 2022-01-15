@extends('Toko.Template.base')
@section('content')

<div class="container">	
	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="card">
				<div  class="card-header">
					<h2 style="color: #008080"><b>Profile Toko</b></h2>
				</div>
			<div class="card-body">
				<section class="content">
					<div class="container-fluid">
					    <div class="row">
					        <div class="col-md-4">
						            <div class="card card-primary card-outline">
						              <div class="card-body box-profile">
						                <div class="text-center">
						                	@if(!empty($user->foto))
						                  		<img src="{{url("public/$user->foto")}}" class="img-fluid">
						                  	@else
						                  		<img src="{{url('public')}}/Admin/assets/img/user.png">
						                	@endif
						                </div>

						                <h3 class="profile-username text-center">{{$user->nama}}</h3>

						                <p class="text-muted text-center">{{$user->email}}</p>
						                <form action="{{url('Toko/profile')}}" method="post" enctype="multipart/form-data">
						                	@csrf
						                	<div class="form-group">
												<label for="" class="control-label"><i class="fa fa-pencil-alt"></i> Edit Foto Profil </label>
												<input type="file" class="form-control" name="foto" accept="image/*">
											</div>
						            </div>
						          </div>
					      	</div>
					      	<div class="col-md-4">
						            <div class="card card-success card-outline">
						              <div class="card-body box-profile">
						                <p class="text">No HP : {{$user->no_hp}}</p>

						                <p class="text"> Alamat : {{$user->alamat}}</p>
						            </div>
						          </div>
					      	</div>
					        <div class="col-md-4">
					        	<div class="card card-warning card-outline">
						            <div class="card-header p-2">
						             	<h3>Edit Profile</h3>
						            </div>
					            <div class="card-body">
					                <div class="tab-content">
								        <div class="form-group">
											<label for="" class="control-label"><b>Nama Toko</b></label>
											<input type="text" class="form-control" value="{{$user->nama}}" name="nama">
										</div>
										<div class="form-group">
											<label for="" class="control-label"><b>Email Toko</b></label>
											<input type="email" class="form-control" value="{{$user->email}}" name="email">
										</div>
								        <div class="form-group">
											<label for="" class="control-label"><b>No. Handphone</b></label>
											<input type="number" class="form-control" value="{{$user->no_hp}}" name="no_hp">
										</div>
										<div class="form-group">
											<label for="" class="control-label"><b>Alamat</b></label>
											<textarea class="form-control" name="alamat">{{$user->alamat}}</textarea>
										</div>
								        <div class="row">
								          <div class="col-md-6">
								            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
								          </div>
								        </div>
								      </form>
					                </div>
					                <div class="col-md-12 mt-2">
					                	<div class="row">
					                		<a href="{{url('Toko/ganti-password')}}">
					                			<div class="btn btn-success"><i class="fa fa-key"></i> Ganti Password</div>
					                		</a>
					                	</div>
					                </div>
					              </div>
					        	</div>
					        </div>
					    </div>
					</div>
	    		</section>
    		</div>
    		</div>
    	</div>
	</div>	
</div>

@endsection