@extends('admin.layouts.master')

@section('content')
    {!! Form::model($package, ['route' => ['admin.package.update', $package], 'method' => 'PUT']) !!}
    @include('admin.package.forms')
    {!! Form::close() !!}
@endsection

@section('js')
@endsection
