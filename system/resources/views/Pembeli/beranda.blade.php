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
  
  <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">            
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1><span>MAOK</span></h1>
                  <h2>Marketplace Oleh-oleh Khas Ketapang</h2>
                  <p>
                    Sebuah marketplace yang dibuat untuk mempermudah para UMKM oleh-oleh khas
                    Ketapang untuk menjual produknya. Marketplace ini dibuat oleh putra daerah.
                  </p>
                   
                    @if(Auth::check())  
                  @else
                      <button type="button" class="btn btn-default get"><a href="{{url('login')}}" style="color: #fff;"> Silahkan Login</a></button>
                  @endif
                </div>
                <div class="col-sm-6">
                  <img src="{{url('public')}}/Client/images/home/Logo MAOK.png" alt="" style="width: 300px; float: right; margin-top: 100px;" />
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/slider-->
  
  <section>
    <div class="container">
      <div class="row">
        @include('Pembeli.template.sidebar')
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            @foreach($list_produk as $produk)
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img style="width: 100%; height: 280px;" src="{{url("public/$produk->foto")}}" class="img-fluid">
                      <h2>Rp. {{number_format($produk->harga)}}</h2>
                      <p>{{$produk->nama}}</p>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>Rp. {{number_format($produk->harga)}}</h2>
                        <p> {{$produk->nama}} </p>
                        <a href="{{url('/produk', $produk->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cek Disini</a>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
          </div><!--features_items-->
          
          <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade active in" id="tshirt" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery1.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery2.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery3.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery4.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="blazers" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery4.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery3.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery2.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery1.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="sunglass" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery3.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery4.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery1.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery2.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="kids" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery1.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery2.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery3.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery4.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="poloshirt" >
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery2.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery4.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery3.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/gallery1.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--/category-tab-->
          
          @include('Pembeli.template.recomended-produk')
          
        </div>
      </div>
    </div>
  </section>
  
  @include('Pembeli.template.footer')
  

  
  @include('Pembeli.template.js')
</body>
</html>