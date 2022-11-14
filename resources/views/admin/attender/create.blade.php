@extends('admin.layouts.master')

@section('content')
    {!! Form::open(['route' => ['admin.attender.store']]) !!}
    @include('admin.attender.forms')
    {!! Form::close() !!}
@endsection

@section('js')
@endsection
