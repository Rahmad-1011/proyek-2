<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar shadow" style="border-radius: 20px;">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							@if(!empty($user->foto))
							<img style="width: 130px; height: 130px;" src="{{url("public/$user->foto")}}" alt="" class="rounded-circle">
							@else
							<img style="width: 90px; height: 90px; border-radius: 50%;" src="{{url('public')}}/Admin/assets/img/user.png">
							@endif
						</div>
						<!-- User Name -->
						<h5 class="text-center">{{$user->nama}}</h5>
						<p>Joined {!! date('d M Y', strtotime($user->created_at)) !!}</p>
						<a href="{{url('profile')}}" class="btn btn-main-sm" style="background-color: #117A65; border-radius: 20px;">Edit Profile</a>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li class="nav-item dropdown dropdown-slide ">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><i class="fa fa-user"></i> Akun Saya
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item {{request()->is('profile') ? 'active' : ''}}" href="{{url('profile')}}">Profil</a>
									<a class="dropdown-item" href="{{url('profile/ganti-password')}}">Ganti Password</a>
								</div>
							</li>
							<li class="{{request()->is('profile/pesanan-saya') ? 'active' : ''}}">
								<a href="{{url('profile/pesanan-saya')}}"><i class="fa fa-bookmark-o"></i> Pesanan Anda <span>{{$list_pesanan->where('status','!=', '5')->count()}}</span></a>
							</li>
							<li>
								<a href="{{url('maok/logout')}}"><i class="fa fa-power-off"></i> Logout</a>
							</li>
						</ul>
					</div>

					<!-- delete-account modal -->
											  <!-- delete account popup modal start-->
                <!-- Modal -->
                <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Are you sure you want to delete your account?</h6>
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                        <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- delete account popup modal end-->
					<!-- delete-account modal -->

				</div>
			</div>