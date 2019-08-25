<div class="table-responsive">
    <table class="table" id="tourismEventRundowns-table">
        <thead>
            <tr>
                <th>Tourism Event Id</th>
        <th>Name</th>
        <th>Time</th>
        <th>Presenter</th>
        <th>Misc</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tourismEventRundowns as $tourismEventRundowns)
            <tr>
                <td>{!! $tourismEventRundowns->tourism_event_id !!}</td>
            <td>{!! $tourismEventRundowns->name !!}</td>
            <td>{!! $tourismEventRundowns->time !!}</td>
            <td>{!! $tourismEventRundowns->presenter !!}</td>
            <td>{!! $tourismEventRundowns->misc !!}</td>
                <td>
                    {!! Form::open(['route' => ['tourismEventRundowns.destroy', $tourismEventRundowns->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tourismEventRundowns.show', [$tourismEventRundowns->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tourismEventRundowns.edit', [$tourismEventRundowns->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
