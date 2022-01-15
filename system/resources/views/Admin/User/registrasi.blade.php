<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registrasi Marketplace Oleh-oleh Khas Ketapang</title>

    <!-- Icons font CSS-->
    <link href="{{url('public')}}/Registrasi/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{url('public')}}/Registrasi/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{url('public')}}/Registrasi/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{url('public')}}/Registrasi/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('public')}}/Registrasi/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                @include('Admin.template.utils.notif')
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="post" action="{{url('Admin/user')}}">
                      @csrf
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="nama">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password" @error('password') is-invalid @enderror>
                            @error('password')
                            <label>
                                <div class="invalid-feedback" style="color: #FF0000">
                                    {{$message}}
                                </div>
                            </label>
                            @enderror
                        </div>
                          <input type="hidden" name="level" value="0">
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{url('public')}}/Registrasi/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="{{url('public')}}/Registrasi/vendor/select2/select2.min.js"></script>
    <script src="{{url('public')}}/Registrasi/vendor/datepicker/moment.min.js"></script>
    <script src="{{url('public')}}/Registrasi/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="{{url('public')}}/Registrasi/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->