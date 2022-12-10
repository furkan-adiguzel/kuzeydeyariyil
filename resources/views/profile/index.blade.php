@extends('layouts.master')

@section('content')

    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">{{ Auth::user()->name }}</h4>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <section class="shop-single padding-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12 sticky-widget">
                    <div class="schedule-list" id="accordionExample-2">
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                        <span class="accor-header-inner d-flex flex-wrap align-items-center">
                                            <span class="h7" style="padding-top: 10px; padding-bottom: 10px;">
                                                Bilgilendirme
                                            </span>
                                        </span>
                                </button>
                            </div>
                            <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1" data-bs-parent="#accordionExample-2">
                                <div class="accordion-body" style="padding-left: 1.25rem;">
                                        <div style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-bottom: 13px; margin-bottom: 13px;">
                                            <p>
                                                Kalan ödeme miktarınızı aşağıda görebilirsiniz Kaydınızın "Onaylandı" olabilmesi için kalan ödemenizi yaptığınızı gösteren belgeyi yüklemelisiniz.
                                            </p>
                                            <p>
                                                Ön ödemenin yapılmasının ardından kayıt durumunuz "Rezervasyon" olarak güncellenecektir. Rezervasyon durumunda olan kişiler için oda arkadaşı seçimleri açılacaktır.
                                            </p>
                                            <p>
                                                Oda arkadaşınız aynı paketi kayıt olmuş kişilerden seçebilirsiniz. Paket değişiklikleri için chat üzerinden bize ulaşmanız yeterli olacaktır.
                                            </p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="review">
                        <div class="review-content review-content-show">
                            <div class="review-showing">
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

                                <ul class="agri-ul content">
                                    @if (!empty($attender))
                                        <li>
                                            <div class="post-content" style="width: 100%; padding: 0;">
                                                <div class="entry-meta">
                                                    <h4>Zirve kaydınız yapıldı</h4>
                                                </div>
                                                <div class="entry-content">
                                                    <div>{{ $attender->created_at->format('d M Y H:i') }} tarihinde Zirve kaydınızı yaptınız.</div>
                                                    @if (!empty($attender->price))
                                                        <br>
                                                        <div>
                                                            Paket: <strong>{{ $attender->package->name }}</strong><br>
                                                            Alınan Ödeme: <strong>{{ $attender->paid_1_amount }} TL</strong><br>
                                                            Kalan Ödeme: <strong>{{ $attender->price - $attender->paid_1_amount - $attender->paid_2_amount }} TL</strong><br>
                                                        </div>
                                                        <br>
                                                        <h5 style="font-weight: 500;">Ödeme Hesabı</h5>
                                                        <p>
                                                            Mert Sökmen Akbank<br>
                                                            TR66 0004 6000 7388 8000 4032 84
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        @if (!$attender->is_paid && empty($attender->receipt_2))
                                            <li style="display: block;">
                                                <div class="post-content" style="width: 100%; padding: 0;">
                                                    <div class="entry-meta">
                                                        <h4>Ödemenizi tamamlayın</h4>
                                                    </div>
                                                    <div class="entry-content">
                                                        <div>Kalan ödemenizi yaptığınız gösteren dekontun resmini ya da PDF halini göndererek ödemenizi tamamlayın.</div>
                                                    </div>
                                                </div>
                                                <div class="client-review" style="padding: 0;">
                                                    <h6 style="font-weight: 500;">Kalan Ödeme: <strong>{{ $attender->price - $attender->paid_1_amount - $attender->paid_2_amount }} TL</strong></h6>
                                                    <div class="review-form">
                                                        <form method="post" action="{{ route('profile.add-receipt') }}" class="row" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-md-4 col-12">
                                                                <input type="file" id="file-receipt" name="receipt" placeholder="Dekont yükleyin" style="display: none" required>
                                                                <button type="button" class="lab-btn" onclick="document.getElementById('file-receipt').click()" style="margin-top: 0; line-height: 44px; width: 100%;">
                                                                    Dekont seçin
                                                                </button>
                                                            </div>
                                                            <div class="col-md-4 col-12">
                                                                <button class="lab-btn" type="submit" style="line-height: 44px;">Gönder</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($attender->room_select && ($attender->room_id === null || $attender->package->room_person > count($attender->room->attenders)))
                                            <li style="display: block;">
                                                <div class="post-content" style="width: 100%; padding: 0;">
                                                    <div class="entry-meta">
                                                        <h4>Oda arkadaşınızı seçebilirsiniz</h4>
                                                    </div>
                                                    <div class="entry-content">
                                                        <div>Artık oda arkadaşınızı seçebilirsiniz. Arkadaşnızın kayıt olduğu cep telefonu numarası ile katılımcılar arasında arayarak seçebilir ve oda arkadaşı olarak ekleyebilirsiniz. Oda arkadaşınızı ekleyebilmek için, arkadaşınızın ödemesini tamamlamış ve sizinle aynı paketi seçmiş olması gerekmektedir.</div>
                                                    </div>
                                                </div>
                                                @if ($roommateRequest)
                                                    <div class="post-content" style="width: 100%; padding: 0;">
                                                        <div class="entry-content">
                                                            <br>
                                                            <h6 style="font-weight: 500;">Bekleyen oda arkadaşı isteğiniz var.</h6>
                                                        </div>
                                                    </div>
                                                @else
                                                    <br>
                                                    <div class="client-review" style="padding: 0;">
                                                        <h6 style="font-weight: 500;">Arkadaşınızın cep telefonu</h6>
                                                        <div class="review-form">
                                                            <form method="post" action="{{ route('profile.add-roommate') }}" class="row">
                                                                @csrf
                                                                <div class="col-md-4 col-12">
                                                                    <input type="text" id="phone" pattern=".{10,10}" placeholder="Cep Telefonu (5541231212)" name="mobile" required title="Başında 0 olmadan 10 haneli telefon numaranızı giriniz.">
                                                                </div>
                                                                <div class="col-md-4 col-12">
                                                                    <button class="lab-btn" type="submit" style="line-height: 44px;">Ekle</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif

                                            </li>
                                        @endif

                                        @if ($attender->room_select && $attender->room_id !== null)
                                            <li style="display: block;">
                                                <div class="post-content" style="width: 100%; padding: 0;">
                                                    <div class="entry-meta">
                                                        <h4>Oda bilgileriniz</h4>
                                                    </div>
                                                    <div class="entry-content">
                                                        <div>
                                                            Paket: <strong>{{ $attender->package->name }}</strong><br>
                                                            Oda Durumu: <strong>{{ count($attender->room->attenders) }} / {{ $attender->package->room_person }} Kişi</strong><br>
{{--                                                            Oda Numarası: <strong>{{ $attender->room->room_number ? $attender->room->room_number : 'Henüz tanımlanmamış'}}</strong><br>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if ($attender->room && count($attender->room->attenders) > 0)
                                                <li style="display: block;">
                                                    <div class="post-content" style="width: 100%; padding: 0;">
                                                        <div class="entry-meta">
                                                            <h4>Oda Arkadaşlarınız</h4>
                                                        </div>
                                                        <div class="entry-content">
                                                            @foreach($attender->room->attenders as $roomAttender)
                                                            <div style="margin-bottom: 10px;">
                                                                <h6 style="font-weight: 500;">{{ $roomAttender->name }} {{ $roomAttender->surname }}</h6>
                                                                <div><small>Kulüp:</small> {{ $roomAttender->club_name }}, <small>Görev:</small> {{ $roomAttender->position_name }}</div>
                                                            </div>
                                                            @endforeach

                                                            <br><br>
                                                            <p><small>Oda arkadaşı değişiklikleri için lütfen bize ulaşın.</small></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endif
                                    @else
                                        <li>
                                            <div class="post-content" style="width: 100%; padding: 0;">
                                                <div class="entry-meta">
                                                    <h4>Zirve kaydınızı yapın</h4>
                                                </div>
                                                <div class="entry-content">
                                                    <div>
                                                        Henüz Zirve katıl kaydınızı yapmamışsınız. Diğer adımları gerçekleştirmek için hemen kaydınızı yapın.<br>
                                                        <strong><a href="{{ route('attend.register') }}" >Kayıt Ol</a></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
