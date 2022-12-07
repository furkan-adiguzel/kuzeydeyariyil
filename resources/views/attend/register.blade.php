@extends('layouts.master')

@section('content')
    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">Geleceğin Asamble'sine katılın.</h4>
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
                @if(false)
                    <section class="coming-soon-section padding-tb">
                        <div class="container">
                            <div class="coming-wrapper text-center">
                                <h1 class="coming-soon-title mb-4">İlginiz için teşekkür ederiz. Kayıtlarımız kapanmıştır.</h1>
                            </div>
                        </div>
                    </section>
                @else
                    <h3 class="title">Asamble'ye Katıl</h3>
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
                    -->
                    <br>
                    <div style="text-align: left">
                    <p>
                        Ön ödemelerinizi "<strong>Mert Sökmen</strong>" adına aşağıdaki IBAN adresine yapınız. <br/>
                        Mert Sökmen Akbank<br>
                        TR66 0004 6000 7388 8000 4032 84
                    </p>
                        Kayıtlar <b>1 Ocak</b>'a kadar devam edecek.
                        Normal kayıt dönemi için yapılması
                        gereken en düşük ön ödeme miktarları:<br/><br/>
                        (Ücretler kişi başıdır.)<br/>
                        <span style="display: inline-block; width: 100px;">Greyjoy</span>: 280₺<br/>
                        <span style="display: inline-block; width: 100px;">Tully</span>: 430₺<br/>
                        <span style="display: inline-block; width: 100px;">Baratheon</span>: 320₺<br/>
                        <span style="display: inline-block; width: 100px;">Lannister</span>: 390₺<br/>
                        <span style="display: inline-block; width: 100px;">Targaryen</span>: 280₺<br/>
                        <span style="display: inline-block; width: 100px;">Tyrell</span>: 320₺<br/>
                        <span style="display: inline-block; width: 100px;">Stark</span>: 340₺<br/>

                    </p>
                    </div>
                    <div class="form-group" style="text-align: left; margin-top: 25px;">
                        <p>Yaptığınız ödemenin dekontunun resmini yükleyin. Telefonda dekont'u ekran görüntüsü alarak yükleyebilirsiniz. Dekont yüklemeden kayıt'ı gerçekleştiremezsiniz!</p>
                        <input type="file" id="file-receipt" name="receipt" placeholder="Dekont yükleyin" style="display: none" required>
                        <button type="button" class="lab-btn" onclick="document.getElementById('file-receipt').click()" style="margin-top: 0; line-height: 40px; width: 200px;">
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
