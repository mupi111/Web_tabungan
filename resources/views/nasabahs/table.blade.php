<div class="table-responsive">
    <table class="table" id="nasabahs-table">
        <thead>
        <tr>
            <th>Nama</th>
        <th>Alamat</th>
        <th>Nomorhp</th>
        <th>Imgnasabah</th>
        <th>Saldo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($nasabahs as $nasabah)
            <tr>
                <td>{{ $nasabah->nama }}</td>
            <td>{{ $nasabah->alamat }}</td>
            <td>{{ $nasabah->nomorhp }}</td>
            <td>{{ $nasabah->imgnasabah }}</td>
            <td>{{ $nasabah->saldo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['nasabahs.destroy', $nasabah->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('nasabahs.show', [$nasabah->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('nasabahs.edit', [$nasabah->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
