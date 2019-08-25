<div class="table-responsive">
    <table class="table" id="clientReviews-table">
        <thead>
            <tr>
                <th>Client User Id</th>
        <th>Date</th>
        <th>Tourism Dest Id</th>
        <th>Satisfactory Level</th>
        <th>Comment</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientReviews as $clientReviews)
            <tr>
                <td>{!! $clientReviews->client_user_id !!}</td>
            <td>{!! $clientReviews->date !!}</td>
            <td>{!! $clientReviews->tourism_dest_id !!}</td>
            <td>{!! $clientReviews->satisfactory_level !!}</td>
            <td>{!! $clientReviews->comment !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientReviews.destroy', $clientReviews->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientReviews.show', [$clientReviews->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientReviews.edit', [$clientReviews->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
