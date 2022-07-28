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
                        <a href="{{url('Toko/produk')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="{{url('Toko/transaksi')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="" class="small-box-footer"><i class="fas fa-info"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
          </section>
        </div>
        <div class="card card-primary card-outline">
          <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <span style="font-size: 18pt">Info Stok Produk <b style="font-size: 12pt; color: red">*Peringatan Stok Produk Anda Kurang Dari 10*</b></span>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
          <section class="content">
                <!-- Default box -->
                <div class="row m-auto">
                    <div class="card card-solid">
                <div class="card-body pb-0">
                  <div class="row d-flex align-items-stretch">
                    @foreach($list_produk as $produk)
                    @if($produk->stok <= 10)
                    <div class="col-sm-6 col-md-4 d-flex mb-3 align-items-stretch">
                      <div class="card shadow border" style="width: 100%">
                        <div class="card-header text-muted border-bottom-0">
                          =
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-7">
                              <h2 class="lead"><b>{{$produk->nama}}</b></h2>
                              <ul class="ml-4 mb-2 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa fa-shopping-basket"></i></span> Stok: {{$produk->stok}}</li>
                                <li class="small"><span class="fa-li"><i class="fa fa-tag"></i></span> {{$produk->kategori->nama}}</li>
                                <li><span class="fa-li" style="font-size: 12pt;"><i class="fa fa-money"></i></span> Harga: Rp. {{number_format($produk->harga)}}</li>
                              </ul>
                              <?php 
                                $komentars = \App\Models\Komentar::where('produk_id', $produk->id)->where('parent', 0)->get();
                                $jumlah_bintang = \App\Models\Komentar::where('produk_id', $produk->id)->sum('bintang');

                                if($komentars->count() > 0){
                                  $bintang = $jumlah_bintang/$komentars->count();
                                }
                                else{
                                  $bintang = 0;
                                }
                                 ?>
                                @php
                                  $b = number_format($bintang)
                                @endphp
                                <span style="font-size: 10pt;">{{$komentars->count()}} Penilaian</span>
                                <ul class="list-inline">
                                  @for($i =1; $i<= $b; $i++)
                                    <li class="list-inline-item"><i class="fa fa-star" style="color: #ffe400"></i></li>
                                  @endfor
                                  @for($j = $b+1; $j<=5; $j++)
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                  @endfor
                                </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                      @if(!empty($produk->foto))
                                      <img style="width: 90px; height: 90px; border-radius: 10px" src="{{url("public/$produk->foto")}}" class="img-fluid">
                                    @else
                                      <img style="width: 90px; height: 90px; border-radius: 50%;" src="{{url('public')}}/Admin/assets/img/user.png">
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                          <a href="{{url('Toko/produk', $produk->id)}}" class="btn btn-primary mr-1" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
                          <a href="{{url('Toko/produk', $produk->id)}}/edit" class="btn btn-warning mr-1" style="width: 40px; border-radius: 5px;"><i class="fa fa-edit"></i></a>
                          @include('Toko.template.utils.delete', ['url'=>url('Toko/produk', $produk->id)])
                        </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                  {!! $list_produk->links() !!}
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
            </div>
                </div>
          </section>
        </div>
    </div>
  </div>
</div>

@endsection