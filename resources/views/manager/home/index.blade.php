@extends('admin.layouts.master')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $attenderCount }}</h3>

                    <p>Katılımcı</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('manager.attender.index') }}" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
@endsection
