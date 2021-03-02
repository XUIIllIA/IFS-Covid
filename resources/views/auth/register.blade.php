<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IFS COVID | Daftar</title>

    <link rel="shortcut icon" href="{{ asset('assets/relo/images/fav.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/relo/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/relo/css/fontawsom-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/relo/css/style.css') }}" />
</head>

<body>
    <div class="container-fluid ">
        <div class="container ">
            <div class="row ">

                <div class="col-sm-10 login-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 box-de">
                            <div class="small-logo">
                                <i class=""></i>
                            </div>
                            <div class="ditk-inf sup-oi">
                                <h2 class="w-100">Apakah anda sudah punya akun ?? </h2>
                                <p>Cukup masuk ke akun Anda dengan mengklik Tombol dibawah ini</p>
                                <a href="index.html">
                                    <a href="{{ route('login') }}"><button type="button"
                                            class="btn btn-outline-light">Masuk</button></a>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 log-det">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <h2>Membuat Akun Anda</h2>
                                <div class="row">
                                    <ul>
                                    </ul>
                                </div>
                                <div class="row">
                                    <p class="small-info"></p>
                                </div>


                                <div class="text-box-cont">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Masukan Nama" aria-describedby="basic-addon1">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukan Email" aria-describedby="basic-addon1">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukan Password" aria-describedby="basic-addon1">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Masukan Lagi Password" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group center sup mb-3">
                                        <button class="btn btn-success btn-round">DAFTAR</button>
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('assets/relo/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/relo/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/relo/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/relo/js/script.js') }}"></script>


</html>
