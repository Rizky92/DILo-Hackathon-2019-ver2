<div class="table-responsive">
    <table class="table" id="missions-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Length</th>
        <th>Points</th>
        <th>Mission Key</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($missions as $missions)
            <tr>
                <td>{!! $missions->name !!}</td>
            <td>{!! $missions->length !!}</td>
            <td>{!! $missions->points !!}</td>
            <td>{!! $missions->mission_key !!}</td>
                <td>
                    {!! Form::open(['route' => ['missions.destroy', $missions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('missions.show', [$missions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('missions.edit', [$missions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
