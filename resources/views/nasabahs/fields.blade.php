<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomorhp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomorhp', 'Nomorhp:') !!}
    {!! Form::text('nomorhp', null, ['class' => 'form-control']) !!}
</div>

<!-- Imgnasabah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imgnasabah', 'Imgnasabah:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('imgnasabah', ['class' => 'custom-file-input']) !!}
            {!! Form::label('imgnasabah', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Saldo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saldo', 'Saldo:') !!}
    {!! Form::number('saldo', null, ['class' => 'form-control']) !!}
</div>