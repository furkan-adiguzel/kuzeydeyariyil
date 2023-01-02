@extends('layouts.master')

@section('content')
    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">Kuzeyde Yarıyıl Zirve'sine katılın.</h4>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <div class="login-section padding-tb">
        <div class="container">
            <div class="account-wrapper account-wrapper-wide">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(time() > 1672779599)
                    <section class="coming-soon-section padding-tb">
                        <div class="container">
                            <h2 class="coming-soon-title mb-4">İlginiz için teşekkür ederiz. Kayıtlarımız kapanmıştır.</h2>
                        </div>
                    </section>
                @else
                    <h3 class="title">Kayıt Ol</h3>
                    <p>Etkinliğe katılmak için lütfen kaydınızı tamamlayın.</p>
                    <form action="{{ route('attend.register') }}" method="post" class="account-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group"><input type="text" placeholder="Ad" name="name" required></div>
                    <div class="form-group"><input type="text" placeholder="Soyad" name="surname" required></div>
                    <div class="form-group">
                        <input type="text" id="phone" pattern=".{10,10}" placeholder="Cep Telefonu (5541231212)" name="mobile" required title="Başında 0 olmadan 10 haneli telefon numaranızı giriniz.">
                    </div>

                    <div class="form-group"><input type="number" placeholder="T.C. Kimlik" name="identity" required></div>
                    <div class="form-group">
                        <select name="club" required>
                            <option style="color:black">Kulüp</option>
                            @foreach($clubs as $key => $club)
                                <option style="color:black" value="{{ $key }}">{{ $club }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="position" required>
                            <option style="color:black">Görev</option>
                            @foreach($positions as $key => $club)
                                <option style="color:black" value="{{ $key }}">{{ $club }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="package" required>
                            <option style="color:black">Paket Seçin</option>
                            @foreach($packages as $package)
                                <option style="color:black" value="{{ $package->p_id }}">{{ $package->name }} ({!! empty($package->description) ? $package->night.' Gece - '. $package->room_person.' Kişi' : $package->description  !!}) </option>
                            @endforeach
                        </select>
                    </div>
                    <!--
                    <div class="form-group"><input type="text" placeholder="Oda Arkadaşı 1 Ad Soyad" name="roommate_1_fullname"></div>
                    <div class="form-group"><input type="number" placeholder="Oda Arkadaşı 1 Cep Telefon" name="roommate_1_mobile"></div>
                    <div class="form-group"><input type="text" placeholder="Oda Arkadaşı 2 Ad Soyad" name="roommate_2_fullname"></div>
                    <div class="form-group"><input type="number" placeholder="Oda Arkadaşı 2 Cep Telefon" name="roommate_2_mobile"></div>
                    <div class="form-group"><input type="text" placeholder="Referans Olan Kişi Ad Soyad" name="reference"></div>
                    <div class="form-group"><input type="text" placeholder="Referans Olan Kişi Ad Soyad" name="reference"></div>

                    -->
                    <br>
                    <div style="text-align: left">
                    <p>
                        Ön ödemelerinizi "<strong>Mert Sökmen</strong>" adına aşağıdaki IBAN adresine yapınız. <br/>
                        Mert Sökmen Akbank<br>
                        TR66 0004 6000 7388 8000 4032 84
                    </p>
{{--                        @if($attenderCount >= 20)--}}
{{--                            Kayıtlar <b>30 Aralık</b>'a kadar devam edecektir. Paket fiyatları ve kayıt anında yapılması gereken minimum ödeme tutarları:<br/><br/>--}}
{{--                            (Ücretler kişi başıdır.)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Greyjoy (1 kişilik oda 1 gece)</span>: 2000₺ (ön ödeme tutarı en az 1000₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Tully (2 kişilik oda 1 gece)</span>: 1725₺ (ön ödeme tutarı en az 865₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Baratheon (3 kişilik oda 1 gece)</span>: 1675₺ (ön ödeme tutarı en az 840₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Lannister (1 kişilik oda 2 gece)</span>: 2875 (ön ödeme tutarı en az 1440₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Targaryen (2 kişilik oda 2 gece)</span>: 2300 (ön ödeme tutarı en az 1150₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Tyrell (3 kişilik oda 2 gece)</span>: 2185₺ (ön ödeme tutarı en az 1100₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Stark (Toplantı+Gala)</span>: 1650₺ (ön ödeme tutarı en az 825₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Martell (Toplantı)</span>: 1100₺ (ön ödeme tutarı en az 550₺)<br/>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                        <div class="form-group" style="text-align: left; margin-top: 25px;">--}}
{{--                        <p>Paket ödemelerini 31 Aralık'a kadar tamamlamanız gerekmektedir. 31 Aralık 23.59'da tamamı ödenmemiş kayıtlar iptal edilecektir ve ilk ödemeler 3 ay içinde iade edilecektir.</p>--}}
{{--                        <p>Yaptığınız ödemenin dekontunun resmini yükleyin. Telefonda dekontun ekran görüntüsü alarak yükleyebilirsiniz. Dekont yüklemeden kayıt gerçekleştiremezsiniz. Dekont dışı yüklemelerde kayıtlar iptal edilecektir.</p>--}}
{{--                        @else--}}
{{--                            Kayıtlar <b>30 Aralık</b>'a kadar devam edecektir. Paket fiyatları ve kayıt anında yapılması gereken minimum ödeme tutarları:<br/><br/>--}}
{{--                            (Ücretler kişi başıdır ve ilk 20 katılımcı içindir.)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Greyjoy (1 kişilik oda 1 gece)</span>: 1750₺ (ön ödeme tutarı en az 875₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Tully (2 kişilik oda 1 gece)</span>: 1500₺ (ön ödeme tutarı en az 750₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Baratheon (3 kişilik oda 1 gece)</span>: 1450₺ (ön ödeme tutarı en az 725₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Lannister (1 kişilik oda 2 gece)</span>: 2500₺ (ön ödeme tutarı en az 1250₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Targaryen (2 kişilik oda 2 gece)</span>: 2000₺ (ön ödeme tutarı en az 1000₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Tyrell (3 kişilik oda 2 gece)</span>: 1900₺ (ön ödeme tutarı en az 950₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Stark (Toplantı+Gala)</span>: 1425₺ (ön ödeme tutarı en az 725₺)<br/>--}}
{{--                            <span style="display: inline-block; width: 300px;">Martell (Toplantı)</span>: 950₺ (ön ödeme tutarı en az 475₺)<br/>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="form-group" style="text-align: left; margin-top: 25px;">--}}
{{--                        <p>Paket ödemelerini 31 Aralık'a kadar tamamlamanız gerekmektedir. 31 Aralık 23.59'da tamamı ödenmemiş kayıtlar iptal edilecektir ve ilk yapılan ödemeler 3 ay içinde iade edilecektir.</p>--}}
{{--                        <p>Yaptığınız ödemenin dekontunun resmini yükleyin. Telefonda dekontun ekran görüntüsü alarak yükleyebilirsiniz. Dekont yüklemeden kayıt gerçekleştiremezsiniz. Dekont dışı yüklemelerde kayıtlar iptal edilecektir.</p>--}}
{{--                        @endif--}}

                        Kayıtlar <b>03 Ocak</b>'a kadar devam edecektir. Paket fiyatları ve kayıt anında yapılması gereken minimum ödeme tutarları:<br/><br/>
                        (Ücretler kişi başıdır.)<br/>
                            <span style="display: inline-block; width: 300px;">Greyjoy (1 kişilik oda 1 gece)</span>: 2200₺<br/>
                            <span style="display: inline-block; width: 300px;">Tully (2 kişilik oda 1 gece)</span>: 1900₺<br/>
                            <span style="display: inline-block; width: 300px;">Baratheon (3 kişilik oda 1 gece)</span>: 1825₺<br/>
                            <span style="display: inline-block; width: 300px;">Lannister (1 kişilik oda 2 gece)</span>: 3150₺<br/>
                            <span style="display: inline-block; width: 300px;">Targaryen (2 kişilik oda 2 gece)</span>: 2530₺<br/>
                            <span style="display: inline-block; width: 300px;">Tyrell (3 kişilik oda 2 gece)</span>: 2400₺<br/>
                            <span style="display: inline-block; width: 300px;">Stark (Toplantı+Gala)</span>: 1800₺<br/>
                            <span style="display: inline-block; width: 300px;">Martell (Toplantı)</span>: 1200₺<br/>
                        </p>
                    </div>
                        <div class="form-group" style="text-align: left; margin-top: 25px;">
                            <p>Paket ödemelerini 03 Ocak'a kadar tamamlamanız gerekmektedir. 03 Ocak 23.59'da tamamı ödenmemiş kayıtlar iptal edilecektir ve ilk yapılan ödemeler 3 ay içinde iade edilecektir.</p>
                            <p>Yaptığınız ödemenin dekontunun resmini yükleyin. Telefonda dekontun ekran görüntüsü alarak yükleyebilirsiniz. Dekont yüklemeden kayıt gerçekleştiremezsiniz. Dekont dışı yüklemelerde kayıtlar iptal edilecektir.</p>


                            <input type="file" id="file-receipt" name="receipt" placeholder="Dekont yükleyin" style="display: none" required>
                        <button type="button" class="lab-btn" onclick="document.getElementById('file-receipt').click()" style="margin-top: 0; line-height: 40px; width: 300px;">
                            <span>Dekont yükleyin</span>
                        </button>
                    </div>

                    <div class="form-group">
                        <button class="d-block lab-btn"><span>Katıl</span></button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection
