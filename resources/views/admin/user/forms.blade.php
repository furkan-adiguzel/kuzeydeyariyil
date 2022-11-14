<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-fill btn-default" href="{{ route('admin.user.index') }}"><i class="fa fa-arrow-circle-left"></i> Geri dön</a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">

        <div class="form-group">
            {!! Form::label('name', 'Kullanıcı adı') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mobile', 'Mobil') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Parola') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role', 'Yetki Rolü') !!}
            {!! Form::select('role', (new \App\Models\User())->roles(), null, ['class' => 'form-control']) !!}
        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="fa fa-check"></i> Kaydet</button>
    </div>
    <!-- /.card-footer -->
</div>
