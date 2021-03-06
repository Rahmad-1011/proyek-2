  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #008080">
    <!-- Brand Logo -->
    <a href="{{url('Admin/beranda')}}" class="brand-link" style="background-color: #008080">
      <img src="{{url('public')}}/Admin/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TOKO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            $user = Auth::user();
          ?>
          @if(!empty($user->foto))
              <img src="{{url("public/$user->foto")}}" class="img-fluid">
          @else
              <img src="{{url('public')}}/Admin/assets/img/user.png">
          @endif
        </div>
        <div class="info">
          <a href="{{url('Toko/profile')}}" class="d-block">
            @if(Auth::check())
                {{request()->user()->nama}}
            @else
                Silahkan Login
            @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{url('Toko/beranda')}}" class="nav-link {{request()->is('Toko/beranda*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('Toko/produk')}}" class="nav-link {{request()->is('Toko/produk*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('Toko/pesanan')}}" class="nav-link {{request()->is('Toko/pesanan*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Transaksi
              </p>
              <?php
                $pesanan = \App\Models\Pesanan::select('pesanan')
                  ->join('pesanan_detail','pesanan_detail.pesanan_id','=','pesanan.id')
                  ->join('produk','produk.id','=','pesanan_detail.produk_id')
                  ->join('kurir', 'kurir.id', '=', 'pesanan.kurir_id')
                  ->join('users', 'users.id','=','pesanan.user_id')
                  ->select('pesanan.*','produk.*','users.*','pesanan_detail.*','pesanan.nama_penerima as nama_pemesan', 'pesanan_detail.status as status_pesanan', 'produk.nama as nama_produk', 'pesanan.foto as bukti_pembayaran', 'kurir.nama as nama_kurir', 'pesanan_detail.bukti as bukti_barang_diterima', 'pesanan.id as id_pesanan', 'pesanan.alamat as alamat_tujuan', 'pesanan.no_hp as no_hp_pemesan')
                  ->where('pesanan.status',3)
                  ->where('produk.user_id', Auth::id())
                  ->get();
              ?>
              @if($pesanan->count() == 0)
              @else
                <span class="badge badge-danger float-right">{{$pesanan->count()}}</span>
              @endif
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{url('Toko/komentar')}}" class="nav-link {{request()->is('Toko/komentar*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Komentar Produk
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>