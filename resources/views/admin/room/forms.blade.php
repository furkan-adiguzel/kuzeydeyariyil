
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-fill btn-default" href="{{ route('admin.room.index') }}"><i class="fa fa-arrow-circle-left"></i> Geri dön</a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('package_id', 'Paket') !!}
            {!! Form::select('package_id', $packages, null, ['class' => 'form-control select2-form', 'style' => 'width: 100%']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('detail', 'Detay') !!}
            {!! Form::text('detail', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Açıklama') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('room_number', 'Oda numarası') !!}
            {!! Form::text('room_number', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('attenders[]', 'Katılımcı Listesi') !!}
            {!! Form::select('attenders[]', $attenders, null, ['class' => 'form-control select2-form', 'style' => 'width: 100%', 'multiple']) !!}
        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="fa fa-check"></i> Kaydet</button>
    </div>
    <!-- /.card-footer -->
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Aktif Katılımcılar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roomAttenders as $id => $attender)
        <tr>
            <td>{{ $attender }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
