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
                            <ul id="countdown" class="countdown count-down" data-date="January 13, 2023 19:00:00">
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
                            <h1>13.Yarıyıl Değerlendirme Zirvesi</h1>
                            <p>Kuzeyin Soğuklarına Hazır Mısınız?</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="banner-image">
                            <img src="/assets/images/banner/banner.png?v=1.1.0" alt="banner-img">
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

{{--    <!-- ==========About Section start Here========== -->--}}
{{--    <section class="about-section padding-tb padding-b bg-image">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-10">--}}
{{--                    <div class="about-image">--}}
{{--                        <img src="/assets/asamble.png" alt="Tanıtım Videosu">--}}
{{--                        <a href="https://asamble2022.com/assets/asamble.mp4" class="play-btn" data-rel="lightcase">--}}
{{--                            <i class="icofont-ui-play"></i>--}}
{{--                            <span class="pluse_2"></span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- Speakers section start here -->
    <section class="speakers-section padding-tb padding-b">
        <div class="container">
{{--            <div class="section-header">--}}
{{--                <h2>Komite Üyeleri</h2>--}}
{{--                <p>Yarıyıl Değerlendirme Zirvesi Komite Üyeleri</p>--}}
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
                                    <h5><a href="{{ route('committee.detail', ['slug' => 'ege']) }}" style="color:white!important">Ege Yigit Ece</a> </h5>
                                    <p>2440. Bölge Rotaract Temsilcisi</p>
                                </div>
                                <div class="spkr-content-details">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="speaker-item">
                            <div class="speaker-inner">
                                <div class="speaker-thumb text-center">
                                    <img src="/assets/images/speakers/evren.png" alt="speaker">
                                </div>
                                <div class="speaker-content">
                                    <div class="spkr-content-title">
                                        <h5><a href="{{ route('committee.detail', ['slug' => 'evren']) }}" style="color:white!important">Evren Köybaşı</a> </h5>
                                        <p>13.Yarıyıl Değerlendirme Zirvesi Koordinatörü</p>
                                    </div>
                                    <div class="spkr-content-details">
                                        <p>Değerli Rotary ve Rotaract Ailem,
                                            1 Temmuz 2022’de Rotary ile Hayal Edelim sloganıyla başladığımız bu dönemimiz her yıl olduğu gibi bu yıl da harika hatıralar biriktirerek devam ediyor. </p>
                                        <a href="{{ route('committee.detail', ['slug' => 'evren']) }}" class="pink" style="color:white!important">Devamı</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="speaker-item">
                            <div class="speaker-inner">
                                <div class="speaker-thumb text-center">
                                    <img style="max-height:280px" src="/assets/images/speakers/guliz.png" alt="speaker">
                                </div>
                                <div class="speaker-content">
                                    <div class="spkr-content-title">
                                        <h5><a href="{{ route('committee.detail', ['slug' => 'evren']) }}" style="color:white!important">Güliz Başaran</a> </h5>
                                        <p>Çanakkale Rotaract Kulübü Başkanı</p>
                                    </div>
                                    <div class="spkr-content-details">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="speaker-item">
                            <div class="speaker-inner">
                                <div class="speaker-thumb text-center">
                                    <img style="max-height:280px" src="/assets/images/speakers/orhan-berkin.png" alt="speaker">
                                </div>
                                <div class="speaker-content">
                                    <div class="spkr-content-title">
                                        <h5><a href="{{ route('committee.detail', ['slug' => 'evren']) }}" style="color:white!important">Orhan Berkin Bizsan</a> </h5>
                                        <p>Balıkesir Rotaract Kulübü Başkanı</p>
                                    </div>
                                    <div class="spkr-content-details">

                                    </div>
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
