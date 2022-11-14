<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-fill btn-default" href="{{ route('admin.attender.index') }}"><i class="fa fa-arrow-circle-left"></i> Geri dön</a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">

        <div class="form-group col-9">
            {!! Form::label('user_id', 'Kullanıcı') !!}
            {!! Form::select('user_id', $users, null, ['class' => 'form-control select2-form', 'style' => 'width: 100%']) !!}
        </div>
        <div class="col-3"></div>

        <div class="form-group  col-6">
            {!! Form::label('name', 'İsim') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group  col-6">
            {!! Form::label('surname', 'Soyisim') !!}
            {!! Form::text('surname', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group  col-6">
            {!! Form::label('mobile', 'Mobil') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group  col-6">
            {!! Form::label('identity', 'Kimlik NO') !!}
            {!! Form::text('identity', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-6">
            {!! Form::label('club', 'Club') !!}
            {!! Form::select('club', \App\Enums\Clubs::getClubs(), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-6">
            {!! Form::label('position', 'Görev') !!}
            {!! Form::select('position', \App\Enums\Role::getRole(), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group  col-6">
            {!! Form::label('package_id', 'Paket') !!}
            {!! Form::select('package_id', $packages, null, ['class' => 'form-control select2-form', 'style' => 'width: 100%']) !!}
        </div>

        <div class="form-group col-6">
            {!! Form::label('status', 'Durum') !!}
            {!! Form::select('status', \App\Enums\Status::getStatus(), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-6">
            {!! Form::label('price', 'Ödeyeceği Miktar') !!}
            {!! Form::number('price', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-6">
            {!! Form::label('paid_1_amount', 'Ön Ödeme') !!}
            {!! Form::number('paid_1_amount', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-6">
            {!! Form::label('paid_2_amount', '2.Ödeme') !!}
            {!! Form::number('paid_2_amount', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-12">
            {!! Form::label('reference', 'Notlar') !!}
            {!! Form::text('reference', null, ['class' => 'form-control']) !!}
        </div>


    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="fa fa-check"></i> Kaydet</button>
    </div>
    <!-- /.card-footer -->
</div>
