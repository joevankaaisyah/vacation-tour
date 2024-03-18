<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Vacation Tour</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css" />
<!--
Parallo Template
https://templatemo.com/tm-534-parallo
-->
  </head>
  <body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg-01.jpg">
      <div class="container-fluid">
        <div class="row tm-brand-row">
          <div class="col-lg-4 col-11">
            <div class="tm-brand-container tm-bg-white-transparent">
              <i class="fas fa-2x fa-pen tm-brand-icon"></i>
              <div class="tm-brand-texts">
                <h1 class="text-uppercase tm-brand-name">vacation tour</h1>
                <p class="small">penyedia layanan wisata, tour, dan travel</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-1">
            <div class="tm-nav">
              <nav class="navbar navbar-expand-lg navbar-light tm-bg-white-transparent tm-navbar">
                <button class="navbar-toggler" type="button"
                  data-toggle="collapse" data-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <div class="tm-nav-link-highlight"></div>
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <div class="tm-nav-link-highlight"></div>
                      <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                      <div class="tm-nav-link-highlight"></div>
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>

        <section class="row" id="tmHome">
          <div class="col-12 tm-home-container">
            <div class="text-white tm-home-left">
              <p class="text-uppercase tm-slogan">Tour Agen Wisata</p>
              <hr class="tm-home-hr" />
              <h2 class="tm-home-title">Buat perjalanan anda menjadi lebih menyenangkan</h2>
              <p class="tm-home-text">
                selamat datang di Vacation Tour. kami adalah agen wisata dan tour yang menyediakan jasa transportasi, penginapan, wisata, dll. 
              </p>
              <p class="tm-home-text">Mari agendakan pejalanan anda di Vacation Tour!</p>
              <a href="#tmFeatures" class="btn btn-primary">Pilih Paket</a>
            </div>
            <div class="tm-home-right">
              <img src="img/travel.jpg" alt="App on Mobile mockup" />
            </div>
          </div>
        </section>

        <!-- Features -->
        <div class="row" id="tmFeatures">
          <div class="col-lg-4">
            <div class="tm-bg-white-transparent tm-feature-box">
            <h3 class="tm-feature-name">PAKET GACOR</h3>
            
            <div class="tm-feature-icon-container">
                <i class="fas fa-3x fa-home"></i>
            </div>

            <p class="text-center">(PAKET LENGKAP)</p>
            <p class="text-center">include: Transportasi PP, Penginapan, Wisata, dan Kuliner</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="tm-bg-white-transparent tm-feature-box">
                <h3 class="tm-feature-name">PAKET GASKEUN</h3>

                <div class="tm-feature-icon-container">
                    <i class="fas fa-3x fa-tree"></i>
                </div>
                <p class="text-center">include: Transportasi PP, Wisata dan Kuliner
                </p>
            </div>
          </div>
          

          <div class="col-lg-4">
            <div class="tm-bg-white-transparent tm-feature-box">
                <h3 class="tm-feature-name">PAKET HEALING</h3>

                <div class="tm-feature-icon-container">
                    <i class="fas fa-3x fa-beer"></i>
                </div>
                <p class="text-center">include: Wisata dan Kuliner
                </p>
            </div>
          </div>
        </div>
        <!-- Call to Action -->
        <section class="row" id="tmCallToAction">
          <div class="col-12 tm-call-to-action-col">
            <img src="img/call-to-action.jpg" alt="Image" class="img-fluid tm-call-to-action-image" />
            <div class="tm-bg-white tm-call-to-action-text">
              <h2 class="tm-call-to-action-title">Agendakan Liburan mu sekarang!</h2>
              <p class="tm-call-to-action-description">
                segera pesan paket liburan sekarang dan dapatkan promo, hadiah dan kejutan lainnya di Vacation Tour.
                paket yang kami sediakan lengkap dan terjangkau. bisa di cek dan ditanya lebih lanjut mengenai paket dan jadwal.
                Ayo tunggu apa lagi? DAFTAR SEKARANG.
              </p>
              <a href="{{route('reservasi.create')}}" class="fa fa-edit btn btn-success btn-xs">RESERVASI HERE!</a>
            </div>
          </div>
        </section>

        <!-- Page footer -->
        <footer class="row">
          <p class="col-12 text-white text-center tm-copyright-text">
            Copyright &copy; 2023 Landing Page. 
            Designed by <a href="#" class="tm-copyright-link">Joevanka Aisyah</a>
          </p>
        </footer>
      </div>
      <!-- .container-fluid -->
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>