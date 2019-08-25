<div class="table-responsive">
    <table class="table" id="adminUsers-table">
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
        @foreach($adminUsers as $adminUsers)
            <tr>
                <td>{!! $adminUsers->username !!}</td>
            <td>{!! $adminUsers->password !!}</td>
            <td>{!! $adminUsers->email !!}</td>
            <td>{!! $adminUsers->remember_token !!}</td>
                <td>
                    {!! Form::open(['route' => ['adminUsers.destroy', $adminUsers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('adminUsers.show', [$adminUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('adminUsers.edit', [$adminUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
