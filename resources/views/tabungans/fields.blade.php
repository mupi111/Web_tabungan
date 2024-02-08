<!-- Nasabah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nasabah', 'Nasabah:') !!}
    {!! Form::select('nasabah', $nasabahs, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Jenistransaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenisTransaksi', 'Jenistransaksi:') !!}
    {!! Form::select('jenisTransaksi', ['Setor' => 'Setor', 'Tarik' => 'Tarik'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::time('time', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>
