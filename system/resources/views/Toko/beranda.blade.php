@extends('Toko.template.base')
@section('content')
<div class="container">
    <div class="row"> 
      <div class="col-md-12 mt-2">
        <div class="card">
          <div class="card-header">
            <h3>Halo Selamat datang</h3>
            <h4 style="margin-left: 10px; color: #008080"><b>{{$user->nama}}</b></h4>
          </div>
        </div>
        <div class="card card-primary card-outline">
    <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Beranda Toko</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    <section class="content">
          <!-- Default box -->
          <div class="row m-auto">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{$produk->count()}}</h3>

                    <p>Produk Saya</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{$pesanan->count()}}</h3>

                    <p>Jumlah Pesanan Barang</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{$kategori->count()}}</h3>
                    <p>Jumlah Kategori</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="{{url('Admin/kategori')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
    </section>
    </div>
  </div>
</div>
</div>

@endsection