<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DigiLib | Sistem Perpustakaan FEB</title>
    <style>
        .card-img-top {
            width: 100%;
            object-fit: cover;
        }
        .box-shadow
        {
            -webkit-box-shadow: 0 1px 1px rgba(72,78,85,.6);
            box-shadow: 0 1px 1px rgba(72,78,85,.6);
            -webkit-transition: all .2s ease-out;
            -moz-transition: all .2s ease-out;
            -ms-transition: all .2s ease-out;
            -o-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        .box-shadow:hover
        {
            -webkit-box-shadow: 0 20px 40px rgba(72,78,85,.6);
            box-shadow: 0 20px 40px rgba(72,78,85,.6);
            -webkit-transform: translateY(-15px);
            -moz-transform: translateY(-15px);
            -ms-transform: translateY(-15px);
            -o-transform: translateY(-15px);
            transform: translateY(-15px);

        }
    </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-digilib.png" alt="" width="120" class="d-inline-block align-text-top img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('/') ? 'active' : ''}}" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('koleksi-buku*') ? 'active' : ''}}" aria-current="page" href="koleksi-buku">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('daftar-skripsi*') ? 'active' : ''}}" aria-current="page" href="daftar-skripsi">Skripsi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    {{-- Awal Footer --}}
    <footer class="text-center text-white text-lg-start mt-5" style="background-color: #000">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <img src="https://is3.cloudhost.id/storage-feb/assets/images/logo_feb_putih.png" class="d-block" alt="logo feb" width="150" />
                <hr style="border: 1px solid #b6b7b7" />
                <h5 class="h5">Fakultas Ekonomi dan Bisnis</h5>
                <p class="text-white-50">Universitas Sains Al Qur’an Jawa Tengah di Wonosobo</p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Tentang Fakultas</h5>
                <ul class="list-unstyled">
                <li>
                    <a href="#!" class="text-white-50" style="text-decoration: none">Sejarah Feb Unsiq</a>
                </li>          
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Kontak</h5>
                <ul class="list-unstyled">
                    <li class="text-white-50">Jl. KH. Hasyim Asy'ari Km. 03, Kalibeber, Kec. Mojotengah, Kab. Wonosobo,</li>
                    <li class="text-white-50">Jawa Tengah - 56351</li>
                    <li class="text-white-50">Telp. : (0286) ******</li>
                    <li class="text-white-50">Whatsapp. : (0286) *******</li>
                </ul>
            </div>
            <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center bg-dark text-white-50 p-3">
            &#169; Copyright All Right Reserved 2022, Faculty of Economics and Business, UNSIQ
        </div>
        <!-- Copyright -->
    </footer>
    
    {{-- Akhir Footer --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>