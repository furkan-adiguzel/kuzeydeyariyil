@extends('layouts.master')

@section('content')
    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">Giriş Yap</h4>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <div class="login-section padding-tb">
        <div class=" container">
            <div class="account-wrapper">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('auth.login') }}" method="post" class="account-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="phone" pattern=".{10,10}" placeholder="Cep Telefonu (5541231212)" name="mobile" required title="Başında 0 olmadan 10 haneli telefon numaranızı giriniz.">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Parola" name="password" required>
                    </div>
                    <div class="form-group">
                        <button class="d-block lab-btn"><span>Giriş Yap</span></button>
                    </div>
                    <p style="margin-top: 30px;"><a href="{{ route('auth.reset-password') }}">Şifremi Unuttum</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
