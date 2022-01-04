<div class="tab-pane fade" id="companyprofile" >
	<div class="col-md-3">
                      <!-- Profile Image -->
      <div class="card card-primary card-outline">

      	<div class="row">
      		<div class="col-md-6">
      			<div class="card-body box-profile">
	            @if(!empty($user->foto))
						<img style="width: 100%" src="{{url("public/$user->foto")}}" class="img-fluid">
					@else
						<img style="width: 100%" src="{{url('public')}}/Admin/assets/img/user.png">
				@endif
	        	</div>
      		</div>
      		<div class="col-md-6">
      			<a href="{{url('/toko', $user->id)}}">
      			<h3 class="profile-username">{{$produk->seller->nama}}</h3>
      			</a>
          		<p class="text-muted">{{$produk->seller->email}}</p>
      		</div>
      	</div>

      </div>

                          <!-- /.card-body -->
    </div>
</div>