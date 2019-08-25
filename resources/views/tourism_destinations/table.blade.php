<div class="table-responsive">
    <table class="table" id="tourismDestinations-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Owner</th>
        <th>Tourism Dest Cat Id</th>
        <th>Address</th>
        <th>Coords</th>
        <th>Email</th>
        <th>Tel</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tourismDestinations as $tourismDestinations)
            <tr>
                <td>{!! $tourismDestinations->name !!}</td>
            <td>{!! $tourismDestinations->description !!}</td>
            <td>{!! $tourismDestinations->owner !!}</td>
            <td>{!! $tourismDestinations->tourism_dest_cat_id !!}</td>
            <td>{!! $tourismDestinations->address !!}</td>
            <td>{!! $tourismDestinations->coords !!}</td>
            <td>{!! $tourismDestinations->email !!}</td>
            <td>{!! $tourismDestinations->tel !!}</td>
                <td>
                    {!! Form::open(['route' => ['tourismDestinations.destroy', $tourismDestinations->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tourismDestinations.show', [$tourismDestinations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tourismDestinations.edit', [$tourismDestinations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
