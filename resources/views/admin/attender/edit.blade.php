@extends('admin.layouts.master')

@section('content')
    {!! Form::model($attender, ['route' => ['admin.attender.update', $attender], 'method' => 'PUT']) !!}
   <div style="font-size: 30px;">
    @if(!empty($attender->receipt_1))
    <a target="_blank" href={{ url('admin/download/'.$attender->receipt_1) }}>Dekont 1</a>
    @endif
    @if(!empty($attender->receipt_2))
    <a target="_blank" href={{ url('admin/download/'.$attender->receipt_2) }}>Dekont 2</a>
    @endif
    @if(!empty($attender->price))
    <div style="display: inline; float: right">
        Kalan Ödeme: <b>{!! $attender->price - ($attender->paid_1_amount + $attender->paid_2_amount) !!}</b>
    </div>
    @endif
   </div>
    <br/>
    <br/>
    <br/>
    @include('admin.attender.forms')
    {!! Form::close() !!}
    <div>
        @if(!empty($attender->receipt_1))
            <img src="/{{ $attender->receipt_1}}">
        @endif

        @if(!empty($attender->receipt_2))
            <img src="/{{ $attender->receipt_2}}">
        @endif
    </div>
@endsection

@section('js')
@endsection
