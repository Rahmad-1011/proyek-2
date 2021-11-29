<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="index.html"><img src="{{url('public')}}/Client/images/home/Logo MAOK.png" alt="" style="width: 175px;" /></a>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                <?php 
                  $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                  if(!empty($pesanan_utama)){
                    $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                  }
                 ?>
                <li><a href="{{url('profile')}}" class="{{request()->is('profile') ? 'active' : ''}}"><i class="fa fa-user"></i> 
                  @if(Auth::check())
                      {{request()->user()->nama}}
                  @else
                      Silahkan Login
                  @endif
                </a></li>
                <li><a href="{{url('/checkout')}}" class="{{request()->is('checkout') ? 'active' : ''}}">
                    <i class="fa fa-shopping-cart"></i>
                    @if(!empty($notif))
                    <span class="badge badge-primary">{{$notif}}</span>
                    @endif
                  </a>
                </li>
                <li><a href="{{url('maok/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="{{url('beranda')}}" class="{{request()->is('beranda') ? 'active' : ''}}">Home</a></li>
                <li><a href="{{url('produk')}}" class="{{request()->is('produk*') ? 'active' : ''}}">Produk</a></li>
                <li><a href="contact-us.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <input type="text" placeholder="Search"/>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->