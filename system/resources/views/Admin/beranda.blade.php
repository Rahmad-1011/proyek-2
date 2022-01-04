@extends('Admin.template.base')
@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Beranda</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">

      <!-- Default box -->
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$produk->count()}}</h3>

                <p>Jumlah Semua Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$toko->count()}}</h3>

                <p>Toko Yang Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('Admin/toko')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$pembeli->count()}}</h3>

                <p>Pembeli Yang Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('Admin/pembeli')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$kategori->count()}}</h3>
                <p>Jumlah Kategori</p>
              </div>
              <div class="icon">
                <i class="ion ion-filing"></i>
              </div>
              <a href="{{url('Admin/kategori')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Slider Beranda Client</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <a href="{{url('Admin/slider')}}">
                    <div class="btn btn-warning"><i class="fa fa-edit"></i> Edit Slider Beranda 1</div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section>

@endsection