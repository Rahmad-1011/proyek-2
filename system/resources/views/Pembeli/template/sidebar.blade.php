<aside class="col-lg-3 order-lg-first">
  <form action="{{url('produk/filter')}}" method="post">
    @csrf
      <div class="sidebar sidebar-shop">
        <div class="widget widget-clean">
          <label>Filters:</label>
        </div><!-- End .widget widget-clean -->

        <div class="widget widget-collapsible">
            <h3 class="widget-title">
              <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                   Kategori
              </a>
          </h3><!-- End .widget-title -->

                  <div class="collapse show" id="widget-1">
                    <div class="widget-body">
                      <div class="filter-items filter-items-count">
                        <div class="filter-item">
                            <select class="col-md-12">
                              <option>Pilih Kategori</option>
                              @foreach($list_kategori as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->nama}} (<span class="item-count">{{$kategori->produk_count}}</span>)</option>
                              @endforeach
                            </select><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->
                      </div><!-- End .filter-items -->
                    </div><!-- End .widget-body -->
                  </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                    <h3 class="widget-title">
                      <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                          Harga
                      </a>
                  </h3><!-- End .widget-title -->

                  <div class="collapse show" id="widget-5">
                    <div class="widget-body">
                        <div class="filter-price">
                            <div class="filter-price-text">
                                 <input type="text" name="harga_min" value="{{$harga_min ?? ""}}" placeholder="Harga Min">
                             </div><!-- End .filter-price-text -->
                             <div class="filter-price-text">
                                 <input type="text" name="harga_max" value="{{$harga_max ?? ""}}" placeholder="Harga Max">
                             </div>
                        </div><!-- End .filter-price -->
                    </div><!-- End .widget-body -->
                    <button class="btn btn-outline-primary-2 btn-minwidth-sm header-right" style="border-radius: 10px;">
                        <span>Filter</span>
                        <i class="icon-search"></i>
                    </button>
                  </div><!-- End .collapse -->
                    </div><!-- End .widget -->
                      </div><!-- End .sidebar sidebar-shop -->
  </form>
</aside>