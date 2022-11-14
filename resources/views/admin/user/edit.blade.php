@extends('admin.layouts.master')

@section('content')
    {!! Form::model($user, ['route' => ['admin.user.update', $user], 'method' => 'PUT']) !!}
    @include('admin.user.forms')
    {!! Form::close() !!}
@endsection

@section('js')
@endsection
