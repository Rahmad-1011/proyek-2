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
                <li><a href="{{url('maok/login')}}" class="{{request()->is('profile') ? 'active' : ''}}"><i class="fa fa-user"></i> 
                  @if(Auth::check())
                      {{request()->user()->nama}}
                  @else
                      Silahkan Login
                  @endif
                </a></li>
                <li><a href="{{url('/maok/login')}}" class="{{request()->is('checkout') ? 'active' : ''}}">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="badge badge-primary"></span>
                  </a>
                </li>
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
                <li><a href="{{url('maok')}}" class="{{request()->is('maok') ? 'active' : ''}}">Beranda</a></li>
                <li><a href="{{url('maok/produk')}}" class="{{request()->is('maok/produk*') ? 'active' : ''}}">Produk</a></li>
                <li><a href="{{url('maok/toko')}}" class="{{request()->is('maok/toko*') ? 'active' : ''}}">Toko</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <form action="{{url('maok/produk/cari')}}" method="post">
              @csrf
              <div class="search_box pull-right">
                <input type="text" name="nama" value="{{$nama ??""}}" placeholder="Cari Nama Produk"/>
              <button class="btn btn-dark"><i class="fa fa-search"></i> Cari</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header>