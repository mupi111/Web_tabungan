<!-- Nasabah Field -->
<div class="col-sm-12">
    {!! Form::label('nasabah', 'Nasabah:') !!}
    <p>{{ $tabungan->nasabah }}</p>
</div>

<!-- Jenistransaksi Field -->
<div class="col-sm-12">
    {!! Form::label('jenisTransaksi', 'Jenistransaksi:') !!}
    <p>{{ $tabungan->jenisTransaksi }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $tabungan->date }}</p>
</div>

<!-- Time Field -->
<div class="col-sm-12">
    {!! Form::label('time', 'Time:') !!}
    <p>{{ $tabungan->time }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $tabungan->jumlah }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tabungan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tabungan->updated_at }}</p>
</div>

