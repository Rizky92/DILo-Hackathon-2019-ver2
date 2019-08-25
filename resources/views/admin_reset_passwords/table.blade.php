<div class="table-responsive">
    <table class="table" id="adminResetPasswords-table">
        <thead>
            <tr>
                <th>Email</th>
        <th>Reset Token</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($adminResetPasswords as $adminResetPasswords)
            <tr>
                <td>{!! $adminResetPasswords->email !!}</td>
            <td>{!! $adminResetPasswords->reset_token !!}</td>
                <td>
                    {!! Form::open(['route' => ['adminResetPasswords.destroy', $adminResetPasswords->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('adminResetPasswords.show', [$adminResetPasswords->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('adminResetPasswords.edit', [$adminResetPasswords->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
