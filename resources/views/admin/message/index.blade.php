@extends('admin.layouts.master')

@section('content')
    {!! Form::open(['route' => ['admin.message.send']]) !!}

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Toplu Mesaj (SMS) Gönder</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-fill btn-default" href="{{ route('admin.home') }}"><i class="fa fa-arrow-circle-left"></i> Geri dön</a>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group">
                {!! Form::label('group', 'Grup') !!}
                {!! Form::select('group', [
                    'to-users' => 'Tüm üyelere',
                    'to-attenders' => 'Tüm katılımcılara',
                    'to-not-attenders' => 'Katılımcı olmayan üyelere',
                    'to-not-have-room' => 'Oda seçmeyen katılımcılara',
                    'to-not-paid' => 'Ödemesini tamamlamayan katılımcılara',
                ], null, ['class' => 'form-control select2-form', 'placeholder' => 'Grup seçin']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message', 'Mesaj') !!}
                {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 4]) !!}
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="fa fa-check"></i> Gönder</button>
        </div>
    </div>


    {!! Form::close() !!}
@endsection

@section('js')
@endsection
