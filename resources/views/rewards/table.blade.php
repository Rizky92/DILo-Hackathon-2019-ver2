<div class="table-responsive">
    <table class="table" id="rewards-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Description</th>
        <th>Reward Token</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rewards as $rewards)
            <tr>
                <td>{!! $rewards->title !!}</td>
            <td>{!! $rewards->description !!}</td>
            <td>{!! $rewards->reward_token !!}</td>
                <td>
                    {!! Form::open(['route' => ['rewards.destroy', $rewards->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('rewards.show', [$rewards->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('rewards.edit', [$rewards->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
