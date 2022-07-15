<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{url('public')}}/Login-baru/style.css" />
    <title>Marketplace Oleh-oleh Khas Ketapang</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{url('maok/login')}}" method="POST" class="sign-in-form">
            @csrf
            <h2 class="title">MAOK - Masuk</h2>
            @include('Admin.template.utils.notif')
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Email Anda" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <input type="hidden" name="level" value="1">
            <input type="submit" name="submit" class="btn solid" value="Login"/>
          </form>

          <form action="{{url('maok/registrasi')}}" method="POST" class="sign-up-form">
            @csrf
            <h2 class="title">MAOK - Daftar</h2>
            <div class="input-field">
              <i class="fas fa-users"></i>
              <select name="level" required>
                <option value="2" hidden > Daftar Sebagai ? </option>
                <option value="2"> Pembeli </option>
                <option value="1"> Toko Oleh-oleh </option>
              </select>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nama" placeholder="Nama Lengkap" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required class="@error('password') is-invalid @enderror" id="password"/>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn solid" style="margin-top: 10px">Daftar</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Anda Pengunjung Baru ?</h3>
            <p>
              Silahkan Daftar Disini Untuk Mendapatkan Oleh-oleh Khas Ketapang
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Daftar Disini
            </button>
          </div>
          <img src="{{url('public')}}/Login-Baru/img/logo MAOK.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Anda Bagian Dari Kami ?</h3>
            <p>
              Mari Menjadi Bagian Dari Kami Untuk Menjelajahi Berbagai Macam-macam Oleh-oleh Khas Ketapang
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Masuk Disini
            </button>
          </div>
          <img src="{{url('public')}}/Login-Baru/img/logo MAOK.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{url('public')}}/Login-baru/app.js"></script>
  </body>
</html>
