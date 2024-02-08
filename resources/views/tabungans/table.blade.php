<div class="table-responsive">
    <table class="table" id="tabungans-table">
        <thead>
        <tr>
            <th>Nasabah</th>
        <th>Jenistransaksi</th>
        <th>Date</th>
        <th>Time</th>
        <th>Jumlah</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tabungans as $tabungan)
            <tr>
                <td>{{ $tabungan->nasabah }}</td>
            <td>{{ $tabungan->jenisTransaksi }}</td>
            <td>{{ $tabungan->date }}</td>
            <td>{{ $tabungan->time }}</td>
            <td>{{ $tabungan->jumlah }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tabungans.destroy', $tabungan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tabungans.show', [$tabungan->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tabungans.edit', [$tabungan->id]) }}"
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
