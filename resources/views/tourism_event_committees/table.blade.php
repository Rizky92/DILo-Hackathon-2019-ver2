<div class="table-responsive">
    <table class="table" id="tourismEventCommittees-table">
        <thead>
            <tr>
                <th>Tourism Event Id</th>
        <th>Name</th>
        <th>Role</th>
        <th>Tel</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tourismEventCommittees as $tourismEventCommittees)
            <tr>
                <td>{!! $tourismEventCommittees->tourism_event_id !!}</td>
            <td>{!! $tourismEventCommittees->name !!}</td>
            <td>{!! $tourismEventCommittees->role !!}</td>
            <td>{!! $tourismEventCommittees->tel !!}</td>
            <td>{!! $tourismEventCommittees->email !!}</td>
                <td>
                    {!! Form::open(['route' => ['tourismEventCommittees.destroy', $tourismEventCommittees->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tourismEventCommittees.show', [$tourismEventCommittees->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tourismEventCommittees.edit', [$tourismEventCommittees->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
