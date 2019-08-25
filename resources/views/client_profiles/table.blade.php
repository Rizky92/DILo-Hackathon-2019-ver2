<div class="table-responsive">
    <table class="table" id="clientProfiles-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Tgl Lahir</th>
        <th>Jk</th>
        <th>Alamat</th>
        <th>Tel</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientProfiles as $clientProfiles)
            <tr>
                <td>{!! $clientProfiles->nama !!}</td>
            <td>{!! $clientProfiles->tgl_lahir !!}</td>
            <td>{!! $clientProfiles->jk !!}</td>
            <td>{!! $clientProfiles->alamat !!}</td>
            <td>{!! $clientProfiles->tel !!}</td>
            <td>{!! $clientProfiles->email !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientProfiles.destroy', $clientProfiles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientProfiles.show', [$clientProfiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientProfiles.edit', [$clientProfiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
