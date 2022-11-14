@extends('admin.layouts.master')

@section('content')
    {!! Form::open(['route' => ['admin.user.store']]) !!}
    @include('admin.user.forms')
    {!! Form::close() !!}
@endsection

@section('js')
@endsection
