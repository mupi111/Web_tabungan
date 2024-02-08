<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $nasabah->nama }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $nasabah->alamat }}</p>
</div>

<!-- Nomorhp Field -->
<div class="col-sm-12">
    {!! Form::label('nomorhp', 'Nomorhp:') !!}
    <p>{{ $nasabah->nomorhp }}</p>
</div>

<!-- Imgnasabah Field -->
<div class="col-sm-12">
    {!! Form::label('imgnasabah', 'Imgnasabah:') !!}
    <p>{{ $nasabah->imgnasabah }}</p>
</div>

<!-- Saldo Field -->
<div class="col-sm-12">
    {!! Form::label('saldo', 'Saldo:') !!}
    <p>{{ $nasabah->saldo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $nasabah->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $nasabah->updated_at }}</p>
</div>

