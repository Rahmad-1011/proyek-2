<header class="header header-2 header-intro-clearance sticky-header">
  <div class="header-middle">
    <div class="container">
      <div class="header-left">
        <button class="mobile-menu-toggler">
          <span class="sr-only">Toggle mobile menu</span>
              <i class="icon-bars"></i>
        </button>
          <a href="index.html" class="logo">
            <img src="{{url('public')}}/Client/images/home/Logo MAOK.png" alt="" style="width: 180px;" />
              </a>
      </div><!-- End .header-left -->

      <div class="header-center">
        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
              <form action="{{url('produk/cari')}}" method="post">
                 @csrf
                <div class="header-search-wrapper search-wrapper-wide">
                    <label for="q" class="sr-only">Search</label>
                      <input type="search" class="form-control" name="nama" id="q" value="{{$nama ??""}}" placeholder="Cari Produk ..." required>
                      <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                </div><!-- End .header-search-wrapper -->
              </form>
        </div><!-- End .header-search -->
      </div>

        <div class="header-right">
            <div class="account">
                <a href="{{url('profile')}}" title="Profil Saya">
                    <div class="icon">
                        <i class="icon-user"></i>
                    </div>
                    <p>Profile</p>
                </a>
            </div><!-- End .compare-dropdown -->

            <div class="dropdown cart-dropdown">
                <?php 
                            $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                            if(!empty($pesanan_utama)){
                              $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            }
                           ?>
                    <div class="account">
                        <a href="{{url('keranjang')}}">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">
                            @if(!empty($notif))
                            {{$notif}}
                            @else
                            0
                            @endif
                            </span>
                        </div>
                        <p>Keranjang</p>
                        </a>
                    </div>
            </div><!-- End .cart-dropdown -->
        </div><!-- End .header-right -->         
    </div><!-- End .container -->
</div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                      @foreach($list_kategori as $kategori)
                                        <li><a href="{{url('produk-kategori', $kategori->slug)}}">{{$kategori->nama}}</a></li>
                                      @endforeach
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf">
                                <li class="megamenu-container {{request()->is('beranda') ? 'active' : ''}}">
                                    <a href="{{url('beranda')}}" class="sf">Beranda</a>
                                </li>
                                <li class="megamenu-container {{request()->is('produk*') ? 'active' : ''}}">
                                    <a href="{{url('produk')}}" class="sf">Produk</a>
                                </li>
                                <li class="megamenu-container {{request()->is('toko*') ? 'active' : ''}}">
                                    <a href="{{url('toko')}}" class="sf">List Toko</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header>