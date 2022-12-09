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
                        *Erken kayıt ücreti ilk 20 kayıt için geçerlidir!
                    </p>
                    @foreach($packages as $package)
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="news-item">
                                <div class="news-inner">

                                    <div class="news-content">
                                        <h6><a href="#" style="text-align: center">
{{--                                                @if(in_array($package->p_id, [1,2,5,6], true))--}}
{{--                                                .<del>{{ $package->name }}</del>--}}
{{--                                                    <b>Tükendi</b>--}}
{{--                                                @else--}}
{{--                                                    {{ $package->name }}--}}
{{--                                                @endif--}}
{{--                                            </a>--}}
{{--                                        </h6>--}}

                                        <div class="pricing-item">
                                            <div class="pricing-inner">
                                                <div class="pricing-content">
                                                    <ul class="facilites">
                                                        <li class="facility-item">
                                                            <span>
                                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                            </span> Erken Kayıt {{$package->price_1}} ₺
                                                        </li>
{{--                                                        <li class="facility-item">--}}
{{--                                                            <span>--}}
{{--                                                                <i class="fa fa-check-circle" aria-hidden="true"></i>--}}
{{--                                                            </span> İndirimli Kayıt {{$package->price_2}} ₺--}}
{{--                                                        </li>--}}
                                                        <li class="facility-item">
                                                            <span>
                                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                            </span> Normal Kayıt  {{$package->price_2}} ₺
                                                        </li>
                                                    </ul>
                                                    <div class="get-ticket">
                                                        <a href="{{ route('attend.register') }}">
                                                            <ul>
                                                                @if(!is_null($package->night))
                                                                <li class="vat">
                                                                    <h4 style="color:white!important;">{{$package->night}}</h4>
                                                                    <p style="color:white!important;">Gece</p>
                                                                </li>
                                                                @endif
                                                                <li class="icon">
                                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                                </li>
                                                                @if(!is_null($package->night))
                                                                <li class="vat">
                                                                    <h4 style="color:white!important;">{{$package->room_person}}</h4>
                                                                    <p style="color:white!important;">Kişi</p>
                                                                </li>
                                                                @endif
                                                                @if(!empty($package->description))
                                                                    <li class="vat">
                                                                        <p style="color:white!important;">{{$package->name}}</p>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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
