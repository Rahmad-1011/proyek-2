<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Marketplace Oleh-oleh Khas Ketapang</title>
    @include('Pembeli.template.css')
</head><!--/head-->

<body>
	@include('Pembeli.template.header')

  <main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('beranda')}}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content pb-0">
        <div class="container">
           <div class="row">
              <div class="col-lg-2">
                 <div class="row justify-content-center">
                    @if(!empty($user->foto))
                    <img style="width: 200px; height: 200px; border-radius: 50%;" src="{{url("public/$user->foto")}}" class="img-fluid">
                    @else
                    <img src="{{url('public')}}/Admin/assets/img/user.png">
                    @endif
                </div>
                <button type="button" class="btn my-3 btn-warning" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-user"></i> Update Profil
              </button>

              <button type="button" class="btn my-3 btn-danger" data-toggle="modal" data-target="#ganti-password">
                  <i class="fa fa-key"></i> Ganti Password
              </button>
          </div>
          <div class="col-lg-7 mb-2 mb-lg-0" style="margin-left: 20px; margin-right: -20px;">
            @include('Pembeli.template.utils.notif')
             <h2 class="title mb-1">Profil</h2><!-- End .title mb-2 -->
             <p class="mb-3">Nama : <b>{{$user->nama}}</b></p>
             <div class="row">
                <div class="col-sm-7">
                   <div class="contact-info">
                      <h3>Informasi Akun</h3>

                      <ul class="contact-list">
                         <li>
                            <i class="icon-map-marker"></i>
                            {{ucwords($user->alamat)}}
                        </li>
                        <li>
                            <i class="icon-phone"></i>
                            <a href="tel:#">{{$user->no_hp}}</a>
                        </li>
                        <li>
                            <i class="icon-envelope"></i>{{ucwords($user->email)}}
                        </li>
                    </ul><!-- End .contact-list -->
                </div><!-- End .contact-info -->


                <!-- Modal Update profil -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Profil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('profile')}}" method="post" class="contact-form mb-3" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="cname" class="sr-only">Name</label>
                                            <input type="text" class="form-control" id="cname" name="nama" value="{{$user->nama}}" placeholder="Nama Lengkap *" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-12">
                                            <label for="cemail" class="sr-only">Email</label>
                                            <input type="email" class="form-control" id="cemail" name="email" value="{{$user->email}}" placeholder="Email *" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="cphone" class="sr-only">No. Handphone</label>
                                            <input type="tel" class="form-control" id="cphone" name="no_hp" value="{{$user->no_hp}}" placeholder="No. Handphone">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-12">
                                            <label for="csubject" class="sr-only">Alamat</label>
                                            <textarea class="form-control" name="alamat" value="{{$user->alamat}}" placeholder="Alamat"></textarea>
                                        </div>
                                        <label for="" class="control-label justify-content-center" style="margin-left: 23px">Edit Foto Profil </label>
                                        <input type="file" class="form-control" name="foto" accept="image/*" >

                                        <button class="btn btn-primary btn-block">Update Profil</button>
                                    </div><!-- End .row -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- end modal -->
<div class="modal fade" id="ganti-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ganti-password">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <div class="card">
        <div class="card-body">
           <form action="{{url('ganti-password')}}" class="contact-form mb-3" method="post">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-sm-12">
                    <span>Password Lama</span>
                    <input type="Password" class="form-control" name="lama" @error('lama') is-invalid @enderror required>
                    @error('lama')
                    <label>
                        <div class="invalid-feedback" style="color: #FF0000">
                            {{$message}}
                        </div>
                    </label>
                    @enderror
                </div><!-- End .col-sm-6 -->

                <div class="col-sm-12">
                    <span>Password Baru</span>
                    <input type="Password" class="form-control" name="baru" @error('baru') is-invalid @enderror required>
                    @error('baru')
                    <label>
                        <div class="invalid-feedback" style="color: #FF0000">
                            {{$message}}
                        </div>
                    </label>
                    @enderror
                </div><!-- End .col-sm-6 -->
                <div class="col-sm-12">
                    <span>Konfirmasi Password Baru</span>
                    <input type="Password" class="form-control" name="konfirmasi" @error('konfirmasi') is-invalid @enderror required>
                    @error('konfirmasi')
                    <label>
                        <div class="invalid-feedback" style="color: #FF0000">
                            {{$message}}
                        </div>
                    </label>
                    @enderror
                </div>

                <button class="btn btn-primary btn-block">Ganti Password</button>
            </div><!-- End .row -->
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>

</div><!-- End .col-sm-7 -->




</div><!-- End .row -->
</div><!-- End .col-lg-6 -->
<div class="col-lg-3">
 <h2 class="title mb-1 mt-1">Pesanan</h2><!-- End .title mb-2 -->
 <div class="row">
    <div class="col-md-12">
        <div class="contact-info" style="margin-left: 20px;">
            <?php 
            $pesanan_pesanan_baru = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',1)->first();
            if(!empty($pesanan_baru)){
                $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_baru->id)->count();
            }

            ?>

             @if(!empty($notif))
            <a href="{{url('pemesanan')}}" style="color: #fff">
                <div class="btn btn-primary btn-block"> Pesanan Anda
                    <span class="badge badge-primary"> {{$notif}}</span>
                   
                </div>
            @else
            <h3>*Tidak Ada Pesanan</h3>
            @endif

            </a>
        </div>
        <div class="contact-info" style="margin-left: 20px;">
            <?php 
            $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',2)->first();
            if(!empty($pesanan_utama)){
                $notif_pembayaran = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
            }

            ?>

             @if(!empty($notif_pembayaran))
            <a href="{{url('pembayaran')}}" style="color: #fff">
                <div class="btn btn-primary btn-block"> Pesanan Yang Belum Dibayar
                    <span class="badge badge-primary"> {{$notif_pembayaran}}</span>
                   
                </div>

            @else
            
            @endif
            </a>
        </div>


    </div>





    <!-- End .contact-form -->
    <div class="row">
        <div class="col-sm-6 mt-2">

        </a>
    </div>
</div>
</div><!-- End .col-lg-6 -->
</div><!-- End .row -->

<hr class="mt-4 mb-5">
</div><!-- End .container -->
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h2 class="title mb-1 mt-1">Pesanan Anda</h2>
        </div>
        <div class="card-body" style="overflow-x: scroll;">
            <table class="table table-hover table-sm">
                <tr class="bg-primary" style="color: #ffffff; text-align: center;">
                    <th style="color: #ffffff">No</th>
                    <th style="color: #ffffff">Nama Pesanan</th>
                    <th style="color: #ffffff">Qty</th>
                    <th style="color: #ffffff">Harga</th>
                    <th style="color: #ffffff">Nama Penerima</th>
                    <th style="color: #ffffff">Status</th>
                </tr>

                @foreach($list_pesanan->sortBydesc('id') as $p)
                <tr style="text-align: center;">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ucwords($p->nama)}}</td>
                    <td>{{$p->jumlah}}</td>
                    <td>Rp. {{number_format($p->jumlah_harga)}}</td>
                    <td>{{ucwords($p->nama_penerima)}}</td>
                    <td>    
                        @if($p->status == 1)
                        <button class="btn btn-success">Barang Dikirim</button>
                        @else

                        <button class="btn btn-warning">Barang Sedang Dikemas</button>

                        @endif

                    </td>
                </tr>
                @endforeach
            </table>

            {{$list_pesanan->links()}}
        </div>
    </div>
</div>
</div>
</div><!-- End .page-content -->
</main>

@include('Pembeli.template.footer')



@include('Pembeli.template.js')
</body>
</html>

