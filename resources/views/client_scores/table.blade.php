<div class="table-responsive">
    <table class="table" id="clientScores-table">
        <thead>
            <tr>
                <th>Client User Id</th>
        <th>Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientScores as $clientScores)
            <tr>
                <td>{!! $clientScores->client_user_id !!}</td>
            <td>{!! $clientScores->total !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientScores.destroy', $clientScores->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientScores.show', [$clientScores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientScores.edit', [$clientScores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
