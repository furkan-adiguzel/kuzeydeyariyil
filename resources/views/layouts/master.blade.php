<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Geleceğin Asamblesi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/x-icon/01.png?v=1.1.0">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=1.1.0">
    <link rel="stylesheet" href="/assets/css/all.min.css?v=1.1.0">
    <link rel="stylesheet" href="/assets/css/lightcase.css?v=1.1.0">
    <link rel="stylesheet" href="/assets/css/swiper.min.css?v=1.1.0">
    <link rel="stylesheet" href="/assets/css/style.css?v=1.1.0">
    <style type="text/css">
        @font-face {
            font-family: "TrajanSans";
            src: url('{{ public_path('font/"TrajanSans"Pro-ExtraLight.ttf') }}');
        }
    </style>
</head>

<body>

<!-- preloader start here -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- preloader ending here -->


<!-- ==========Header Section Starts Here========== -->
<header class="header-section">
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper" style="padding: 0;">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img height="100px" style="height: 100px" src="/assets/images/logo/logo.png?v=1.1.0" alt="logo">
                    </a>
                </div>
                <div class="menu-area">
                    <ul class="menu">
                        <li><a href="{{ route('committee') }}">Komite</a></li>
                        <li><a href="{{ route('hotel') }}">Otel</a></li>
                        <li><a href="{{ route('program') }}">Program</a></li>
                        <li><a href="{{ route('sponsors') }}">Sponsorlar</a></li>
                        @if(Auth::check())
                            <li><a href="{{ route('attenders') }}">Katılımcılar</a></li>
                            <li><a href="{{ route('packages') }}">Paketler</a></li>
                            @if(! Auth::user()->attender)
                                <li><a href="{{ route('attend.register') }}" >Asamble'ye Katıl</a></li>
                            @endif
                            <li><a href="{{ route('profile') }}"><i class="icofont-user-alt-2"></i> Profil</a></li>
                            <li><a href="{{ route('auth.logout') }}"><i class="icofont-logout"></i></a></li>
                        @else
                            <li><a href="{{ route('auth.login') }}">Giriş Yap</a></li>
                            <li><a href="{{ route('auth.register') }}">Hesap Oluştur</a></li>
                        @endif
                    </ul>

                    <!-- toggle icons -->
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ==========Header Section Ends Here========== -->

@yield('content')

<!-- Footer Section start here -->
<footer class="footer-section" style="background-image: url(/assets/images/bg-images/footer-bg.png);">
    <div class="footer-top">
        <div class="container">
            <div class="row g-3 justify-content-center g-lg-0">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="footer-top-item lab-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="/assets/images/footer/footer-top/instagram.png" alt="Phone-icon">
                            </div>
                            <div class="lab-content">
                                <span><a href="https://www.instagram.com/kuzeydeyariyil/">kuzeydeyariyil</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="footer-top-item lab-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="/assets/images/footer/footer-top/02.png" alt="email-icon">
                            </div>
                            <div class="lab-content">
                                <span>Email : kuzeydeyariyil@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="footer-top-item lab-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="/assets/images/footer/footer-top/03.png" alt="location-icon">
                            </div>
                            <div class="lab-content">
                                <span>Mithatpaşa, 15 Eylül Cd. No:68,<br> 10405 Ayvalık/Balıkesir</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-content text-center">
                        <p>&copy;2023 <a href="{{ route('home')  }}">Agora Rotaract</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section end here -->


<!-- scrollToTop start here -->
<a href="#" class="scrollToTop"><i class="icofont-bubble-up"></i><span class="pluse_1"></span><span
        class="pluse_2"></span></a>
<!-- scrollToTop ending here -->


<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/fontawesome.min.js"></script>
<script src="/assets/js/waypoints.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/swiper.min.js"></script>
<script src="/assets/js/circularProgressBar.min.js"></script>
<script src="/assets/js/isotope.pkgd.min.js"></script>
<script src="/assets/js/lightcase.js"></script>
<script src="/assets/js/functions.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/jquery.inputmask@5.0.0-beta.87/dist/jquery.inputmask.min.js"></script>
{{--<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="9e0ece86-4a63-4d56-a726-cec898902c58";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>--}}


<script>
    $(document).ready(function(){
        $('#phone').inputmask();
    });
</script>
</body>

</html>
