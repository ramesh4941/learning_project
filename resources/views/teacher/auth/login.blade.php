<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">
<head><!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EduLites | Admin Login</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="EduLites">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <!-- Favicon -->
    <link rel="icon" href="https://spruko.com/demo/ynex/dist/assets/images/brand-logos/favicon.ico" type="image/x-icon">
    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/authentication-main.js')}}"></script> <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css')}}" rel="stylesheet"> <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet">
    <meta http-equiv="imagetoolbar" content="no" />
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                {{-- <div class="my-5 d-flex justify-content-center"> 
                    <a href="index.html">
                        <img src="{{ asset('assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                        <img src="{{ asset('assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
                    </a>
                </div> --}}
                <div class="card custom-card">
                    <div class="card-header justify-content-between"> 
                        <div class="card-title"> Adminstration Sign In </div>
                    </div>
                    <div class="card-body p-4">
                        {{-- <p class="h5 fw-semibold mb-2 text-center">Adminstration Sign In</p> --}}
                        <div class="row gy-3">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="col-xl-12 mb-3">
                                    <label for="email" class="form-label text-default">Email Address</label>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default d-block">Password</label>
                                    <div class="input-group">
                                        <input id="signin-password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label text-muted fw-normal" for="remember"> Remember Me </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Sign In</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/custom-switcher.min.js')}}"></script> <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script> <!-- Show Password JS -->
    <script src="{{ asset('assets/js/show-password.js')}}"></script>
</body>
</html>