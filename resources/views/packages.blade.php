@extends('layouts.master')

@section('content')
    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">Paketler</h4>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->


    <!-- ===== News Section Start here  ==== -->
    <section class="news-section padding-tb padding-b">
        <div class="container">
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center">
                    <p>
                        *Konaklama içeren paketlere "Toplantı" ve "Gala" ücretleri dahildir.<br/>
                        *Tüm paket fiyatları kişi başı ücretlerdir.<br/>
{{--                        *Erken kayıt ücreti ilk 20 kayıt için geçerlidir!--}}
                    </p>
                    @foreach($packages as $package)
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="news-item">
                                <div class="news-inner">
                                    <a href="<?php echo e(route('attend.register')); ?>" >
                                        <div class="news-content" style="color:white!important;">
                                            <div class="pricing-item">
                                                <div class="pricing-inner" style="text-align: center">
                                                    <h2 >{{ $package->name }}</h2>
                                                    <img class="package-image" src="/assets/images/packages/{{$package->name}}.png" style="width: 75%;margin-bottom: 2rem;" alt="package">
                                                    <div class="pricing-content"style="padding-bottom:1rem;">
                                                        <h5>
                                                            {{$package->description}}<br>
{{--                                                            <span @if($attenderCount >= 20)style="text-decoration: line-through;@endif">Normal Kayıt {{$package->price_1}} ₺</span><br>--}}
{{--                                                            Geç Kayıt  {{$package->price_2}} ₺<br>--}}
                                                             Kayıt Ücreti {{$package->price_1}} ₺<br>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ===== News Section end here  ==== -->

@endsection
