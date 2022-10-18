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
            height: 18vw;
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
    
    <footer class="text-white text-center text-md-start mt-auto" style="background-color: #161616">
        {{-- <div class="container-fluid p-4">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-11 p-3">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
                            <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-digilib-putih.png" class="d-block img-fluid" width="150" alt="logo digilib feb  " />
                            <hr style="border: 1px solid #b6b7b7" />
                            <h5 class="h5" style="color: #b6b7b7">Fakultas Ekonomi dan Bisnis</h5>
                            <p style="color: #505050">Universitas Sains Al Qur’an Jawa Tengah di Wonosobo</p>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">Tentang Fakultas</h5>

                            <p style="color: #505050">Sejarah Feb Unsiq</p>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase mb-3">Kontak</h5>

                            <div class="text-right" style="color: #505050">
                                <p class="text-right">Jl. KH. Hasyim Asy'ari Km. 03, Kalibeber, Kec. Mojotengah, Kab. Wonosobo,</p>
                                <p class="text-right">Jawa Tengah - 56351</p>
                                <p class="text-right">Telp. : (0286) ******</p>
                                <p class="text-right">Fax. : (0286) *******</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid">
            <div class="row d-flex justify-content-center" style="background-color: #343434">
                <div class="col-lg-11 d-flex justify-content-between align-items-center">
                    <div class="text-left p-3" style="color: #aeaeae">Copyright All Right Reserved 2022, Faculty of Economics and Business, UNSIQ</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="" class="icon-footer">
                            <i class="fa fa-facebook-f p-3"></i>
                        </a>
                        <a href="" class="icon-footer">
                            <i class="fa fa-instagram p-3"></i>
                        </a>
                        <a href="" class="icon-footer">
                            <i class="fa fa-twitter p-3" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>