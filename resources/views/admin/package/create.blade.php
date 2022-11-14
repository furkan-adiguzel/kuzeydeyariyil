@extends('admin.layouts.master')

@section('content')
    {!! Form::open(['route' => ['admin.package.store']]) !!}
    @include('admin.package.forms')
    {!! Form::close() !!}
@endsection

@section('js')
@endsection
