@extends('layouts.master')

@section('content')

    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">Otel</h4>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <!-- Contact Us Section Start Here -->
    <div class="contact-section">
        <div class="contact-top padding-tb aside-bg padding-b">
            <div class="container">

                <div class="contact-info-wrapper">
                    <div class="contact-info-title">
                        <h5>Pine Bay Holiday Resort </h5>
                    </div>
                    <div class="contact-info-content">
                        <div class="row g-5">
                            <div class="col-lg-6 col-12">
                                <div class="contact-info-item">
                                    <div class="contact-info-inner">
                                        <div class="contact-info-thumb">
                                            <img src="/assets/images/contact/01.png" alt="address">
                                        </div>
                                        <div class="contact-info-details">
                                            <span class="fw-bold">Adres</span>
                                            <p>Bayraklıdede
                                                Camlimani Mevkii, 09400 Kuşadası/Aydın</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="contact-info-item">
                                    <div class="contact-info-inner">
                                        <div class="contact-info-thumb">
                                            <img src="/assets/images/contact/04.png" alt="address">
                                        </div>
                                        <div class="contact-info-details">
                                            <span class="fw-bold">Website</span>
                                            <p>pinebay.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <!-- Gallary section start here-->
    <div class="gallery-section padding-tb">
        <div class="container">
            <div class="grid pb-15">
                <div class="grid-item eid-ul-adha eid-ul-fitr">
                    <div class="grid-inner">
                        <div class="grid-thumb">
                            <img src="/assets/images/hotel/1.jpeg" alt="gallery-img">
                        </div>
                        <div class="grid-content p-2">
                            <a href="/assets/images/hotel/1.jpeg" data-rel="lightcase"><i
                                    class="icofont-expand"></i></a>
                            <h5>Havuz</h5>
                        </div>
                    </div>
                </div>
                <div class="grid-item ramadan">
                    <div class="grid-inner">
                        <div class="grid-thumb">
                            <img src="/assets/images/hotel/2.jpeg" alt="gallery-img">
                        </div>
                        <div class="grid-content">
                            <a href="/assets/images/hotel/2.jpeg" data-rel="lightcase"><i
                                    class="icofont-expand"></i></a>
                            <h5>Dış Görünüm</h5>
                        </div>
                    </div>
                </div>
                <div class="grid-item ramadan eid-ul-fitr">
                    <div class="grid-inner">
                        <div class="grid-thumb">
                            <img src="/assets/images/hotel/4.jpeg" alt="gallery-img">
                        </div>
                        <div class="grid-content">
                            <a href="/assets/images/hotel/4.jpeg" data-rel="lightcase"><i
                                    class="icofont-expand"></i></a>
                            <h5>Dış Görünüm</h5>
                        </div>
                    </div>
                </div>
                <div class="grid-item ramadan shab-e-barat">
                    <div class="grid-inner">
                        <div class="grid-thumb">
                            <img src="/assets/images/hotel/3.jpeg" alt="gallery-img">
                        </div>
                        <div class="grid-content">
                            <a href="/assets/images/hotel/3.jpeg" data-rel="lightcase"><i
                                    class="icofont-expand"></i></a>
                            <h5>Odalar</h5>
                        </div>
                    </div>
                </div>
                <div class="grid-item shab-e-barat eid-ul-fitr">
                    <div class="grid-inner">
                        <div class="grid-thumb">
                            <img src="/assets/images/hotel/5.jpeg" alt="gallery-img">
                        </div>
                        <div class="grid-content">
                            <a href="/assets/images/hotel/5.jpeg" data-rel="lightcase"><i
                                    class="icofont-expand"></i></a>
                            <h5>Odalar</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallary section end here-->
    <div class="contact-bottom">
        <div class="contac-bottom">
            <div class="row justify-content-center g-0">
                <div class="col-12">
                    <div class="location-map">
                        <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3147.7912547588417!2d27.263132115292976!3d37.91194161202891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14beab8a541c02d9%3A0x5245fb8dfdbbddd3!2sPine%20Bay%20Holiday%20Resort!5e0!3m2!1str!2str!4v1639613388650!5m2!1str!2str" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Us Section ENding Here -->

@endsection
