<div class="table-responsive">
    <table class="table" id="clientHistories-table">
        <thead>
            <tr>
                <th>Client User Id</th>
        <th>Tourism Dest Id</th>
        <th>Time</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientHistories as $clientHistories)
            <tr>
                <td>{!! $clientHistories->client_user_id !!}</td>
            <td>{!! $clientHistories->tourism_dest_id !!}</td>
            <td>{!! $clientHistories->time !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientHistories.destroy', $clientHistories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientHistories.show', [$clientHistories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientHistories.edit', [$clientHistories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
