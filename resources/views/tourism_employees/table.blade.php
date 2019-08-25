<div class="table-responsive">
    <table class="table" id="tourismEmployees-table">
        <thead>
            <tr>
                <th>Tourism Dest Id</th>
        <th>Nama</th>
        <th>Tgl Lahir</th>
        <th>Jk</th>
        <th>Alamat</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Jabatan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tourismEmployees as $tourismEmployees)
            <tr>
                <td>{!! $tourismEmployees->tourism_dest_id !!}</td>
            <td>{!! $tourismEmployees->nama !!}</td>
            <td>{!! $tourismEmployees->tgl_lahir !!}</td>
            <td>{!! $tourismEmployees->jk !!}</td>
            <td>{!! $tourismEmployees->alamat !!}</td>
            <td>{!! $tourismEmployees->tel !!}</td>
            <td>{!! $tourismEmployees->email !!}</td>
            <td>{!! $tourismEmployees->jabatan !!}</td>
                <td>
                    {!! Form::open(['route' => ['tourismEmployees.destroy', $tourismEmployees->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tourismEmployees.show', [$tourismEmployees->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tourismEmployees.edit', [$tourismEmployees->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
