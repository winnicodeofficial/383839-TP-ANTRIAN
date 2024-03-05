    <!-- Form Login -->

    <!-- Mirrored from daftarpuskesmas.depok.go.id/Login/index by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Feb 2024 15:42:53 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Online Puskesmas Prembun</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="../assets-view/img/favicon.png" type="image/x-icon">

    <link href="{{ asset('template-daftar/assets-view/css-login/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-daftar/assets-view/css-login/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-daftar/assets-view/css-login/iofrm-stylee.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-daftar/assets-view/css-login/iofrm-theme8.css') }}">
    <link rel="stylesheet" href="{{ asset('template-daftar/assets-admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">


    <div class="form-body" class="container-fluid">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3 style="font-weight: 700 !important;">Registrasi Online Puskesmas Prembun.</h3>
                    <p>Kesehatan anda kepuasan kami</p>
                    <img src="{{ asset('template-daftar/assets-view/img/mg-pukesmas.jpeg') }}" alt="Foto Pukesmas Prembun" style="max-width: 100%; max-height: 500px;">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="jumbotron jumbotron-fluid kotak">
                            <div class="container">
                                <img src="../assets-view/img/4.png" class="gambar" alt="">
                            </div>
                        </div>
                        <h3 style="font-weight: 650 !important; margin-bottom: 0px;">Pendaftaran Online</h3>
                        <p style="margin-bottom: 20px !important;">Puskesmas Prembun</p>
                        <p style="font-size :16px;" id="title">Masukan Rekam Medis</p>
                        <form id="login-form" action="/check-data" method="get">
                            <div id="login-by-nik-form">
                                <input class="form-control" id="nik" title="Minimal 16 karakter" name="no_rm" type="text" placeholder="masukkan Rekam Medis" autofocus autocomplete="off">
                                <button type="submit" id="btn-login-by-nik" class="btn btn ibtn" style="background-color:white; border-radius: 10px; height: 43px; color:#2CCFBB;">Cek</button>
                                <br><br>
                            </div>
                            <div id="login-by-name-form">
                                <span class="text-white" id="ket-login">Anda Pasien Baru. Klik </span>
                                <a href="/biodata-pasien" id="login-by-nik-btn">Disini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .gambar {
            display: none;
        }

        .kotak {
            display: none;
        }

        .form-body {
            overflow-y: auto;
            overflow-x: hidden;
        }

        @media only screen and (max-width: 600px) {
            .gambar {
                display: block;
                width: 100%;
                justify-content: center;
            }

            .form-holder .form-content {
                padding: 24px 60px 60px;
            }

            .kotak {
                display: block;
                width: auto;
                background-color: white;
                margin: -10% -24% 11% -24%;
            }

            .regis {
                margin-top: -64%;
            }
        }
    </style>

    <script type="text/javascript" src="../assets-view/js-login/jquery.min.js"></script>
    <script type="text/javascript" src="../assets-view/js-login/popper.min.js"></script>
    <script type="text/javascript" src="../assets-view/js-login/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets-view/js-login/main.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets-admin/vendors/sweetalert2/sweetalert2.min.css" />
    <script src="../assets-admin/vendors/sweetalert2/sweetalert2.min.js"></script>

    <script src="../assets-admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets-admin/js/datepicker.js"></script>