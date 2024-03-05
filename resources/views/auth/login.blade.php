<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Pukesmans Prembun</title>

    <link rel="icon" href="{{ asset('assets/img/pdip_01.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/modules/fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
</head>

<body style="background-image: url('{{ asset('assets/gambar_1.jpg') }}'); background-size: cover; background-position: center;">
    <div id="app">
        <section class="section login-section">
            <div class="container mt-5">
                <div id="clock"></div>
                <div id="weather"></div>


                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('assets/img/logo-puskesmas.png') }}" alt="logo" width="100">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">&nbsp;&nbsp;<h4 style="font-weight: 700; font-size: 24px; color: #064E3B">Sistem - Administrator</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation @if($errors->has('email') || $errors->has('password')) was-validated @endif" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ old('email') }}" name="email" tabindex="1" required autofocus>
                                        @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" name="password" tabindex="2" required>
                                        @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .login-section {
            background-image: url('{{ asset(' public/assets/gambar_1.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        #clock {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            font-size: 50px;
            font-weight: bold;
        }

        #weather {
            font-size: 1.5em;
        }
    </style>
    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var timeString = hours + ':' + minutes + ':' + seconds;

            document.getElementById('clock').innerText = timeString;

            setTimeout(updateClock, 1000); // Update setiap 1 detik
        }

        function getWeather() {
            // Ganti dengan kunci API OpenWeatherMap Anda
            var apiKey = 'ab93d055cd6c52303faa89e9b875d912';
            // Ganti dengan lokasi yang diinginkan (nama kota)
            var location = 'Jakarta';

            var apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${location}&appid=${apiKey}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    var weatherDescription = data.weather[0].description;
                    var temperature = Math.round(data.main.temp - 273.15); // Konversi dari Kelvin ke Celsius

                    var weatherString = `Cuaca: ${weatherDescription}, Suhu: ${temperature}°C`;
                    document.getElementById('weather').innerText = weatherString;
                })
                .catch(error => console.error('Error fetching weather:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateClock(); // Panggil fungsi jam
            getWeather(); // Panggil fungsi cuaca

            // Update cuaca setiap 10 menit
            setInterval(getWeather, 600000);
        });
    </script>
    <!-- General JS Scripts -->
    <script src="{{ asset('template/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('template/modules/popper.js') }}"></script>
    <script src="{{ asset('template/modules/tooltip.js') }}"></script>
    <script src="{{ asset('template/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/modules/moment.min.js') }}"></script>
    <script src="{{ asset('template/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template/js/scripts.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
</body>

</html>