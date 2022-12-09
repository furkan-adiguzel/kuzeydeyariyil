@extends('../layouts.master')

@section('content')
    <style>
        .committee-member-link {
            text-align: center;
        }
        .committee-member-pic {
            height: 300px !important;
        }
    </style>

    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">Komite Üyeleri</h4>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <!-- ==== Speaker-section start here ===== -->
    <div class="speaker-section padding-b ">
        <div class="container">
            <div class="section-wrapper">
                <div class="row g-5 pt-5">
                    <div class="col-lg-6 col-12">
                        <div class="speaker-item-2">
                            <div class="speaker-inner">
                                <div class="speaker-thumb">
                                    <a href="#" class="committee-member-link ">
                                        <img class="committee-member-pic" src="/assets/images/speakers/ege-yigit.png" alt="speaker">
                                        <h3 class="text-center pt-3">Ege Yiğit Ece</h3>
                                        <p class="text-center">Rotaract 2440. Bölge Rotaract Temsilcisi</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="speaker-item-2">
                            <div class="speaker-inner">
                                <div class="speaker-thumb">
                                    <a href="{{ route('committee.detail', ['slug' => 'evren']) }}" class="committee-member-link ">
                                        <img class="committee-member-pic" src="/assets/images/speakers/evren.png" alt="speaker">
                                        <h3 class="text-center pt-3">Evren Köybaşı</h3>
                                        <p class="text-center">13. Yarıyıl Değerlendirme Zirvesi Komite Başkanı</p>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="speaker-item-2">
                            <div class="speaker-inner">
                                <div class="speaker-thumb">
                                    <a href="#" class="committee-member-link ">
                                        <img class="committee-member-pic" src="/assets/images/speakers/guliz.png" alt="speaker">
                                        <h3 class="text-center pt-3">Güliz Başaran</h3>
                                        <p class="text-center">Çanakkale Rotaract Kulübü Başkanı </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="speaker-item-2">
                            <div class="speaker-inner">
                                <div class="speaker-thumb">
                                    <a href="#" class="committee-member-link ">
                                        <img class="committee-member-pic" src="/assets/images/speakers/orhan-berkin.png" alt="speaker">
                                        <h3 class="text-center pt-3">Orhan Berkin Bizsan</h3>
                                        <p class="text-center">Balıkesir Rotaract Kulübü Başkanı</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="speaker-item-2">
                            <div class="speaker-inner">
                                <div class="speaker-thumb">
                                    <a href="#" class="committee-member-link ">
                                        <img class="committee-member-pic" src="/assets/images/speakers/beste.png" alt="speaker">
                                        <h3 class="text-center pt-3">Beste Sarsılmaz</h3>
                                        <p class="text-center">Balıkesir Rotaract Kulübü Başkanı</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 pt-5">
                        <div class="speaker-item-2">
                            <div class="speaker-inner">
                                <div class="speaker-thumb text-center">
                                    <a href="#">
                                        <p class="text-center">Furkan Adıgüzel</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== Speaker-section end here ===== -->

@endsection
