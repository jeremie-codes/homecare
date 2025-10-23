@extends('layouts.base')

@section('title')
    LOGIN
@endsection

@section('content')

    <!-- Start Login 
    ============================================= -->
    <div class="login-register-area bg-gray-gradient-secondary">
        <div class="login-style-one-items">
            <div class="shape">
                <img src="{{ asset('front/assets/img/shape/banner-7.jpg') }}" alt="Imge Not Found">
            </div>
            <div class="thumb ">
                <img src="{{ asset('front/assets/img/shape/logo.png') }}" alt="Imge Not Found" style="width: 200px; height: 200px; position: absolute; top: 0px; left: 20px;">
                <img src="{{ asset('front/assets/img/hr.png') }}" alt="Imge Not Found" style="height: 600px; position: absolute; bottom: 0px; right: -20px;">
            </div>
            <div class="container">
                <div class="row align-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="login-register-items text-light">
                            <img src="{{ asset('front/assets/img/shape/logo.png') }}" class="img-fluid d-md-none" width="100px">
                            <h2 class="text-dark">Se connecter</h2>
                            <p class="text-secondary">
                                Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="text-info fw-light">Créer un compte</a>
                            </p>

                            @if(session('errorAuth'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                    <a href="#" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
                                    <strong>Error, </strong> {{ session('errorAuth') }}
                                </div>
                                
                                <script>
                                    var alertList = document.querySelectorAll(".alert");
                                    alertList.forEach(function (alert) {
                                        new bootstrap.Alert(alert);
                                    });
                                </script>
                            @endif
                            
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="email" name="email" class="form-control border border-secondary placeholder text-dark rounded-3" placeholder="Email or Phone*" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group position-relative">
                                            <input id="password" name="password" class="form-control border border-secondary placeholder text-dark rounded-3" placeholder="Password*" type="password">
                                            <i class='bxr bx-eye-alt text-secondary fs-4' id="eye"  style="cursor: pointer; position: absolute; right: 20px; top: 50%; transform: translateY(-50%);" onclick="showPassword()"></i> 
                                            <i class='bxr bx-eye-slash text-secondary fs-4' id="eye-slash" style="cursor: pointer; display: none; position: absolute; right: 20px; top: 50%; transform: translateY(-50%);" onclick="showPassword()"></i> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="remember-pass">
                                            <div class="check-box">
                                                <input type="checkbox" id="remember" name="remember" value="Remember Me">
                                                <label for="remember" class="text-secondary"> Remember Me</label>
                                            </div>
                                            <a href="#" class="text-dark">Mot de passe oublié?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-lg circle btn-theme animation" type="submit">Se connecter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->

@endsection

@section('script')
    <script>
        function showPassword() {
            var password = document.getElementById("password");
            var eye = document.getElementById("eye");
            var eyeSlash = document.getElementById("eye-slash");
            if (password.type === "password") {
                password.type = "text";
                eye.style.display = "none";
                eyeSlash.style.display = "block";
            } else {
                password.type = "password";
                eye.style.display = "block";
                eyeSlash.style.display = "none";
            }
        }
    </script>
@endsection