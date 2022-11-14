<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-fill btn-default" href="{{ route('manager.attender.index') }}"><i class="fa fa-arrow-circle-left"></i> Geri dön</a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">

        <div class="form-group col-9">
            {!! Form::label('user_id', 'Kullanıcı') !!}

            <p>{{ $attender->user?->name }}</p>
        </div>
        <div class="col-3"></div>

        <div class="form-group  col-6">
            {!! Form::label('name', 'İsim') !!}

            <p>{{ $attender->name }}</p>
        </div>

        <div class="form-group  col-6">
            {!! Form::label('surname', 'Soyisim') !!}
            <p>{{ $attender->surname }}</p>
        </div>

        <div class="form-group  col-6">
            {!! Form::label('mobile', 'Mobil') !!}
            <p>{{ $attender->mobile }}</p>
        </div>

        <div class="form-group  col-6">
            {!! Form::label('identity', 'Kimlik NO') !!}
            <p>{{ $attender->identity }}</p>
        </div>

        <div class="form-group col-6">
            {!! Form::label('club', 'Club') !!}
            <p>{{ $attender->club }}</p>
        </div>

        <div class="form-group col-6">
            {!! Form::label('position', 'Görev') !!}
            <p>{{ $attender->position }}</p>
        </div>

        <div class="form-group  col-6">
            {!! Form::label('package_id', 'Paket') !!}
            <p>{{ $attender->package?->name }}</p>
        </div>

        <div class="form-group col-6">
            {!! Form::label('status', 'Durum') !!}
            <p>{{ $attender->status }}</p>
        </div>

        <div class="form-group col-6">
            {!! Form::label('price', 'Ödeyeceği Miktar') !!}
            <p>{{ $attender->price }}</p>
        </div>

        <div class="form-group col-6">
            {!! Form::label('paid_1_amount', 'Ön Ödeme') !!}
            <p>{{ $attender->paid_1_amount }}</p>
        </div>

        <div class="form-group col-6">
            {!! Form::label('paid_2_amount', '2.Ödeme') !!}
            <p>{{ $attender->paid_2_amount }}</p>
        </div>

        <div class="form-group col-12">
            {!! Form::label('reference', 'Notlar') !!}
            <p>{{ $attender->reference }}</p>
        </div>


    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="fa fa-check"></i> Kaydet</button>
    </div>
    <!-- /.card-footer -->
</div>
