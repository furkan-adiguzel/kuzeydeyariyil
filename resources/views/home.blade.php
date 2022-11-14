@extends('layouts.master')

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-wrapper shape-a">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="banner-content">
                            <ul id="countdown" class="countdown count-down" data-date="March 11, 2022 21:00:00">
                                <li class="clock-item"><span class="count-number days">00</span>
                                    <p class="count-text">Gün</p>
                                </li>

                                <li class="clock-item"><span class="count-number hours">00</span>
                                    <p class="count-text">Saat</p>
                                </li>

                                <li class="clock-item"><span class="count-number minutes">00</span>
                                    <p class="count-text">Dak.</p>
                                </li>

                                <li class="clock-item"><span class="count-number seconds">00</span>
                                    <p class="count-text">San.</p>
                                </li>
                            </ul>
                            <h1>23. Rotaract Asamblesi</h1>
                            <p>Geleceğin Asamblesine Hazır Mısınız?</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="banner-image">
                            <img src="/assets/images/banner/banner.png" alt="banner-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner Section end Here========== -->
    <style>
        .asamble-scores h2:after {top: -55px;}
    </style>
    <section class="speakers-section asamble-scores padding-tb" style="padding-bottom: 0; margin-bottom: -30px;">
        <div class="container">
            @foreach($firstClub as $clubId => $clubCount)
                <div class="section-header" style="min-height: 290px;">
                    <h2>
                        <span style="font-size: 60px;">1.</span><br>
                        {{ $allClubs[$clubId] }}
                    </h2>
                    <p>{{ $clubCount }} Katılımcı</p>
                </div>
            @endforeach
            <div class="row">
                @foreach($clubs as $clubId => $clubCount)
                    <div class="col-md-6 col-12">
                        <div class="section-header" style="min-height: 290px;">
                            <h2 style="font-size: 36px;">
                                <span style="font-size: 60px;">{{ $loop->iteration +1 }}.</span><br>
                                {{ $allClubs[$clubId] }}
                            </h2>
                            <p>{{ $clubCount }} Katılımcı</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==========About Section start Here========== -->
    <section class="about-section padding-tb padding-b bg-image">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="about-image">
                        <img src="/assets/asamble.png" alt="Tanıtım Videosu">
                        <a href="https://asamble2022.com/assets/asamble.mp4" class="play-btn" data-rel="lightcase">
                            <i class="icofont-ui-play"></i>
                            <span class="pluse_2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers section start here -->
    <section class="speakers-section padding-tb padding-b">
        <div class="container">
{{--            <div class="section-header">--}}
{{--                <h2>Komite Üyeleri</h2>--}}
{{--                <p>Asambe2022 Komite Üyeleri</p>--}}
{{--            </div>--}}


            <div class="section-wrapper shape-b">


                <div class="row g-5">
                    <div class="speaker-item">
                        <div class="speaker-inner">
                            <div class="speaker-thumb text-center">
                                <img src="/assets/images/speakers/ege.png" alt="speaker">
                            </div>
                            <div class="speaker-content">
                                <div class="spkr-content-title">
                                    <h5><a href="{{ route('committee.detail', ['slug' => 'ege']) }}">Ege Yigit Ece</a> </h5>
                                    <p>GLD Bölge Rotaract Temsilcisi</p>
                                </div>
                                <div class="spkr-content-details">
                                    <p>Değerli Rotary ve Rotaract Ailem,
                                        Bölgemizin en büyük ve önemli organizasyonlarından olan Asamble’leler her dönem içinde heyecanla beklenen, sıcaklığını asla kaybetmeyen ve yeni döneme ilk adımların atıldığı organizasyonumuzdur. </p>
                                    <a href="{{ route('committee.detail', ['slug' => 'ege']) }}" class="pink">Devamı</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="speaker-item">
                            <div class="speaker-inner">
                                <div class="speaker-thumb text-center">
                                    <img src="/assets/images/speakers/ozenc.png" alt="speaker">
                                </div>
                                <div class="speaker-content">
                                    <div class="spkr-content-title">
                                        <h5><a href="#">Özenç Akova</a> </h5>
                                        <p>Kulüp Başkanı</p>
                                    </div>
                                    <div class="spkr-content-details">
                                        <p>Değerli Rotary ve Rotaract Ailem;

                                            Agora Rotaract Kulübü olarak, yeni bir döneme, yeni deneyimlere, yeni heyecanlara hep
                                            beraber hoş geldin diyeceğimiz dönemin en keyifli organizasyonuna, 23. UR 2440. Bölge
                                            Rotaract Asamblesi’ne ev sahipliği yapacak olmanın sevincini yaşıyoruz.</p>
                                        <a href="#" class="pink">Devamı</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="speaker-item">
                        <div class="speaker-inner">
                            <div class="speaker-thumb text-center">
                                <img src="/assets/images/speakers/ceren.png" alt="speaker">
                            </div>
                            <div class="speaker-content">
                                <div class="spkr-content-title">
                                    <h5><a href="{{ route('committee.detail', ['slug' => 'ceren']) }}">Ceren Arsal</a> </h5>
                                    <p>Asamble Komite Başkanı</p>
                                </div>
                                <div class="spkr-content-details">
                                    <p>Değerli Rotary ve Rotaract Ailem,

                                        Bölge Rotaract Asamblesi’ne, geçmişten gelen değerleri ve geleceğe atılan temelleri ile bu sene Agora Rotaract Kulübü olarak ev sahipliği yapacak olmaktan büyük mutluluk duyuyoruz. </p>
                                    <a href="{{ route('committee.detail', ['slug' => 'ceren']) }}" class="pink">Devamı</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Speakers section end here -->

@endsection
