<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Marketplace Oleh-oleh Khas Ketapang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('public')}}/Client/assets/img/favicon.png" rel="icon">
  <link href="{{url('public')}}/Client/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="{{url('public')}}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('public')}}/Client/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{url('public')}}/Client/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{url('public')}}/Client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('public')}}/Client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('public')}}/Client/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{url('public')}}/Client/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{url('public')}}/Client/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{url('public')}}/Client/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{url('public')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="{{url('public')}}/Client/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

@include('Pembeli.template.header')

  <!-- ======= Hero Section ======= -->
@yield('content')
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #000;">Prosedur Pelayanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <img style="width: 100%" src="{{url('public')}}/Client/assets/img/prosedur.jpg">
                      </div>
                      <div class="modal-footer">
                        <span class="modal-title" id="exampleModalLongTitle" style="color: #000">Badan Perencanaan Pembangunan Daerah Kabupaten Ketapang</span>
                      </div>
                    </div>
                  </div>
                </div>

    <!-- ======= About Section ======= -->


    <!-- ======= Counts Section ======= -->
    

  <!-- ======= Footer ======= -->
@include('Pembeli.template.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('public')}}/Client/assets/vendor/purecounter/purecounter.js"></script>
  <script src="{{url('public')}}/Client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('public')}}/Client/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{url('public')}}/Client/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{url('public')}}/Client/assets/vendor/php-email-form/validate.js"></script>

  <script src="{{url('public')}}/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{url('public')}}/Client/assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>