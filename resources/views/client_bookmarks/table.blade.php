<div class="table-responsive">
    <table class="table" id="clientBookmarks-table">
        <thead>
            <tr>
                <th>Client User Id</th>
        <th>Tourism Dest Id</th>
        <th>Date</th>
        <th>Title</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientBookmarks as $clientBookmarks)
            <tr>
                <td>{!! $clientBookmarks->client_user_id !!}</td>
            <td>{!! $clientBookmarks->tourism_dest_id !!}</td>
            <td>{!! $clientBookmarks->date !!}</td>
            <td>{!! $clientBookmarks->title !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientBookmarks.destroy', $clientBookmarks->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientBookmarks.show', [$clientBookmarks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientBookmarks.edit', [$clientBookmarks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
