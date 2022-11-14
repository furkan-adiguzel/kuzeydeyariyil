@extends('admin.layouts.master')

@section('content')
    {!! Form::model($room, ['route' => ['admin.room.update', $room], 'method' => 'PUT']) !!}
    @include('admin.room.forms')
    {!! Form::close() !!}
@endsection

@section('js')
@endsection
