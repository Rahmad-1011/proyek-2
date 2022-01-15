<footer class="footer footer-2">
          <div class="footer-middle">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 col-lg-6">
                    <div class="widget widget-about">
                      <img src="{{url('public')}}/Client/images/home/Logo MAOK.png" alt="" style="width: 180px;" />
                      <p>
                        Marketplace Oleh-oleh Khas Ketapang yang dibuat oleh Mahasiswa Politeknik Negeri Ketapang Jurusan Teknik Informatika.
                      </p>
                      
                      <div class="widget-about-info">
                          <h5>Ada Keluhan?</h5> <br>
                        <div class="row">
                          <div class="col-sm-6 col-md-4">
                            <span class="widget-about-title">No. Telp: </span>
                            <a href="tel:0895702460425">+62895702460425</a>
                          </div><!-- End .col-sm-6 -->
                          <div class="col-sm-6 col-md-8">
                            <span class="widget-about-title">Email: </span>
                            <a href="mailto:@rahmadardianto69">@rahmadardianto69@gmail.com</a>
                          </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->
                      </div><!-- End .widget-about-info -->
                    </div><!-- End .widget about-widget -->
                  </div><!-- End .col-sm-12 col-lg-3 -->
                  <div class="col-lg-2"></div>
                  <div class="col-lg-2"></div>

                  <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                      <h4 class="widget-title">Kateogori</h4><!-- End .widget-title -->

                      <ul class="widget-list">
                        @foreach($list_kategori as $kategori)
                        <li><a href="{{url('produk-kategori', $kategori->slug)}}">{{$kategori->nama}}</a></li>
                        @endforeach
                      </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                  </div><!-- End .col-sm-4 col-lg-3 -->
                </div><!-- End .row -->
              </div><!-- End .container -->
          </div><!-- End .footer-middle -->

          <div class="footer-bottom">
            <div class="container">
              <p class="footer-copyright">Copyright © 2021 Marketplace Oleh-oleh Khas Ketapang. All Rights Reserved.</p><!-- End .footer-copyright -->

              <div class="social-icons social-icons-color">
                <span class="social-label">Social Media</span>
              <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
              <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
              <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
            </div><!-- End .soial-icons -->
            </div><!-- End .container -->
          </div><!-- End .footer-bottom -->
        </footer>