@extends('layouts.master')

@section('content')
    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">Katılımcılar</h4>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <div class="shop-cart padding-tb">
        <div class="container">
            <div class="schedule-right schedule-pack">
                <div class="schedule-list" id="accordionExample-2">
                    @foreach($clubs as $clubId => $clubCount)
                        @if(!empty(\App\Enums\Clubs::getClubs()[$clubId]))
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading-{{ $clubId }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $clubId }}" aria-expanded="false" aria-controls="collapse-{{ $clubId }}">
                                    <span class="accor-header-inner d-flex flex-wrap align-items-center">
                                        <span class="h7" style="padding-top: 10px; padding-bottom: 10px;">
                                            {{ \App\Enums\Clubs::getClubs()[$clubId] }} &nbsp; ({{ $clubCount }} Katılımcı)
                                        </span>
                                    </span>
                                </button>
                            </div>
                            <div id="collapse-{{ $clubId }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $clubId }}" data-bs-parent="#accordionExample-2">
                                <div class="accordion-body" style="padding-left: 1.25rem;">
                                    @foreach($groupedList[$clubId] as $attender)
                                    <div style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-bottom: 13px; margin-bottom: 13px;">
                                        <p class="float-end" style="margin: 0"><span class="badge {{ $attender->status_data['class'] }}">{{ $attender->status_data['label'] }}</span></p>
                                        <p style="margin: 0">{{ $attender->hidden_name }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
