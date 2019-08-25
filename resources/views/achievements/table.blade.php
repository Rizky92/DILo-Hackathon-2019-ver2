<div class="table-responsive">
    <table class="table" id="achievements-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Points</th>
        <th>Achievement Key</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($achievements as $achievements)
            <tr>
                <td>{!! $achievements->name !!}</td>
            <td>{!! $achievements->points !!}</td>
            <td>{!! $achievements->achievement_key !!}</td>
                <td>
                    {!! Form::open(['route' => ['achievements.destroy', $achievements->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('achievements.show', [$achievements->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('achievements.edit', [$achievements->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
