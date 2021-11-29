<div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              @foreach($list_kategori as $kategori)
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">{{$kategori->nama}} <span class="pull-right">({{$kategori->produk_count}})</span></a></h4>
                </div>
              </div>
              @endforeach
            </div><!--/category-products-->
            
            <div class="shipping text-center"><!--shipping-->
              <img src="{{url('public')}}/Client/images/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
          
          </div>
        </div>