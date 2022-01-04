<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAOK-Mendaftar</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{url('public')}}/Pendaftaran/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{url('public')}}/Pendaftaran/css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="{{url('Pembeli/user')}}" method="POST" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Daftar Sebagai Pembeli</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nama" id="name" placeholder="Nama Lengkap" @error('nama') is-invalid @enderror required value="{{old('nama')}}"/>
                            @error('nama')
                            <label>
                                <div class="invalid-feedback" style="color: #FF0000">
                                    {{$message}}
                                </div>
                            </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email Anda" @error('email') is-invalid @enderror required value="{{old('email')}}"/>
                            @error('email')
                            <label>
                                <div class="invalid-feedback" style="color: #FF0000">
                                    {{$message}}
                                </div>
                            </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" @error('password') is-invalid @enderror required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            @error('password')
                            <label>
                                <div class="invalid-feedback" style="color: #FF0000">
                                    {{$message}}
                                </div>
                            </label>
                            @enderror
                        </div>
                        <input type="hidden" name="level" value="2">
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Daftar Sekarang"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah Punya Akun ? <a href="{{url('maok/login')}}" class="loginhere-link">Login Disini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{url('public')}}/Pendaftaran/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('public')}}/Pendaftaran/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>