<div class="table-responsive">
    <table class="table" id="clientUsers-table">
        <thead>
            <tr>
                <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Remember Token</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientUsers as $clientUsers)
            <tr>
                <td>{!! $clientUsers->username !!}</td>
            <td>{!! $clientUsers->password !!}</td>
            <td>{!! $clientUsers->email !!}</td>
            <td>{!! $clientUsers->remember_token !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientUsers.destroy', $clientUsers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientUsers.show', [$clientUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientUsers.edit', [$clientUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
