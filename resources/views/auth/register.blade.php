@extends('layouts.base')

@section('title')
    REGISTER
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
                <img src="{{ asset('front/assets/img/shape/logo.png') }}" alt="Imge Not Found" style="width: 150px; height: 150px; position: absolute; top: 0px; left: 0px; z-index: 1;">
                <img src="{{ asset('front/assets/img/shape/jon.avif') }}" alt="Imge Not Found" style="height: 600px; position: absolute; bottom: 0px; right: -20px;">
            </div>
            <div class="container py-4">
                <div class="row align-center" style="overflow-y: scroll; scrollbar-width: none">
                    <div class="col-xl-5 col-lg-6">
                        <div class="login-register-items text-light">
                            <img src="{{ asset('front/assets/img/shape/logo.png') }}" class="img-fluid d-md-none" width="100px">
                            <h2 class="text-dark">Créer un compte</h2>
                            <p class="text-secondary">
                                Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-info fw-normal">Se connecter</a>
                            </p>
                            <form action="{{ route('register') }}" class="register-form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 pe-md-1">
                                        <div class="form-group">
                                            <input id="firstName" required name="firstName" class="form-control border border-secondary placeholder text-dark rounded-3" placeholder="Prénom*" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ps-md-1">
                                        <div class="form-group">
                                            <input id="lastName" name="lastName" class="form-control border border-secondary placeholder text-dark rounded-3" placeholder="Nom *" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="email" required name="email" class="form-control border border-secondary placeholder text-dark rounded-3" placeholder="Email *" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2 mb-md-0">
                                    <div class="col-6 pe-1">
                                        <div class="form-group radio-btn text-secondary rounded-3 border-danger py-0 d-flex justify-content-center align-items-center gap-2 border px-2">
                                            <input id="role" name="role" class="role" type="radio" value="candidate" checked>
                                            <div>
                                                <label for="role">Candidat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 ps-1">
                                        <div class="form-group radio-btn text-secondary rounded-3 py-0 d-flex justify-content-center align-items-center gap-2 border px-2">
                                            <input id="role2" name="role" class="role" type="radio" value="client">
                                            <div>
                                                <label for="role2">Employeur</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <input id="password" name="password" class="form-control border border-secondary placeholder text-dark rounded-3" placeholder="Your Password*" type="password">
                                            <div class="form-control required text-center d-flex" style="padding-top: 15px; padding-bottom: 15px;
                                                cursor: pointer; background-color: transparent; width: 60px;" onclick="showPassword()">
                                                <i class='bxr bx-eye-alt fs-4 ' id="eye"></i> 
                                                <i class='bxr bx-eye-slash fs-4' id="eye-slash" style="cursor: pointer; display: none;"></i>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <input id="password2" required name="passwordConfirm" class="form-control border border-secondary placeholder text-dark rounded-3" placeholder="Confirm Password*" type="password">
                                            <div class="form-control text-center d-flex" style="padding-top: 15px; padding-bottom: 15px;
                                                cursor: pointer; background-color: transparent; width: 60px;" onclick="showPassword()">
                                                <i class='bxr bx-eye-alt fs-4 ' id="eye2"></i> 
                                                <i class='bxr bx-eye-slash fs-4' id="eye-slash2" style="cursor: pointer; display: none;"></i>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="col-12 d-none confirm">
                                        <small class="text-danger">Les Mots de passe doivent correspondre</small>
                                    </div>
                                    <div class="col-12 d-none length">
                                        <small class="text-danger">Le Mot de passe doit contenir au moins 8 caractères</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="remember-pass">
                                            <div class="check-box">
                                                <input type="checkbox" id="remember" name="remember" required value="Remember Me">
                                                <label for="remember" class="text-secondary"> Accepter les <a href="#" class="text-info fw-normal">termes et conditions</a></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-block rounded-3 col-12 btn-theme animation" type="submit">Créer un compte</button>
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
    
    <script>
        // lele si on clique sur sur form-group d'un radio que ca active le border-danger et l'input radio 
        // selectionner tous les form-group
        const formGroup = document.querySelectorAll('.radio-btn');
        for (let i = 0; i < formGroup.length; i++) {
            formGroup[i].addEventListener('click', function() {
                formGroup.forEach(formGroup => {
                    formGroup.classList.remove('border-danger');
                })
                
                this.classList.add('border-danger');
                this.querySelector('input').checked = true;
            })
        }

        // selectionner tous les input radio
        const role = document.querySelectorAll('.role');
        for (let i = 0; i < role.length; i++) {
            role[i].addEventListener('change', function() {
                role.forEach(role => {
                    role.parentElement.classList.remove('border-danger');
                })
                
                this.parentElement.classList.add('border-danger');
                this.checked = true;
            })
        }

        // N'envoyer le formulaire que si les mot de passe correspondent 
        document.querySelector('.register-form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const password2 = document.getElementById('password2').value;
            if (password !== password2) {
                e.preventDefault();
                document.querySelector('.confirm').classList.remove('d-none');
            }
            if (password.length < 8) {
                e.preventDefault();
                document.querySelector('.length').classList.remove('d-none');
            }

                // Envoyer en AJAX
            const response = await fetch(this.action, {
                method: 'POST',
                headers: {
                    "X-CSRF-TOKEN": token
                },
                body: formData
            });

            const result = await response.json();
            console.log(result);
        })

        function showPassword() {
            var password = document.getElementById("password");
            var password2 = document.getElementById("password2");
            var eye = document.getElementById("eye");
            var eye2 = document.getElementById("eye2");
            var eyeSlash = document.getElementById("eye-slash");
            var eyeSlash2 = document.getElementById("eye-slash2");
            if (password.type === "password" || password2.type === "password") {
                password.type = "text";
                password2.type = "text";
                eye.style.display = "none";
                eyeSlash.style.display = "block";
                eye2.style.display = "none";
                eyeSlash2.style.display = "block";
            } else {
                password.type = "password";
                password2.type = "password";
                eye.style.display = "block";
                eyeSlash.style.display = "none";
                eye2.style.display = "block";
                eyeSlash2.style.display = "none";
            }
        }
    </script>

@endsection