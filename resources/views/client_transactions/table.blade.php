<div class="table-responsive">
    <table class="table" id="clientTransactions-table">
        <thead>
            <tr>
                <th>Client User Id</th>
        <th>Tourism Serv Prod Id</th>
        <th>Time</th>
        <th>Quantity</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientTransactions as $clientTransactions)
            <tr>
                <td>{!! $clientTransactions->client_user_id !!}</td>
            <td>{!! $clientTransactions->tourism_serv_prod_id !!}</td>
            <td>{!! $clientTransactions->time !!}</td>
            <td>{!! $clientTransactions->quantity !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientTransactions.destroy', $clientTransactions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientTransactions.show', [$clientTransactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientTransactions.edit', [$clientTransactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
