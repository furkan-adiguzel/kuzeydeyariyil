@extends('admin.layouts.master')

@section('content')
    {!! Form::open(['route' => ['admin.room.store']]) !!}
    @include('admin.room.forms')
    {!! Form::close() !!}
@endsection

@section('js')
@endsection
