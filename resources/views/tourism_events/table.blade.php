<div class="table-responsive">
    <table class="table" id="tourismEvents-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Tourism Event Cat Id</th>
        <th>Event Holder Name</th>
        <th>Event Holder Tel</th>
        <th>Event Holder Email</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th>Quota</th>
        <th>Tourism Dest Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tourismEvents as $tourismEvents)
            <tr>
                <td>{!! $tourismEvents->name !!}</td>
            <td>{!! $tourismEvents->description !!}</td>
            <td>{!! $tourismEvents->tourism_event_cat_id !!}</td>
            <td>{!! $tourismEvents->event_holder_name !!}</td>
            <td>{!! $tourismEvents->event_holder_tel !!}</td>
            <td>{!! $tourismEvents->event_holder_email !!}</td>
            <td>{!! $tourismEvents->date_start !!}</td>
            <td>{!! $tourismEvents->date_end !!}</td>
            <td>{!! $tourismEvents->quota !!}</td>
            <td>{!! $tourismEvents->tourism_dest_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['tourismEvents.destroy', $tourismEvents->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tourismEvents.show', [$tourismEvents->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tourismEvents.edit', [$tourismEvents->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
