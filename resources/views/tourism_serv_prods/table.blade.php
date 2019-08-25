<div class="table-responsive">
    <table class="table" id="tourismServProds-table">
        <thead>
            <tr>
                <th>Tourism Dest Id</th>
        <th>Tourism Serv Prod Cat Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Is Available</th>
        <th>Tel</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tourismServProds as $tourismServProds)
            <tr>
                <td>{!! $tourismServProds->tourism_dest_id !!}</td>
            <td>{!! $tourismServProds->tourism_serv_prod_cat_id !!}</td>
            <td>{!! $tourismServProds->name !!}</td>
            <td>{!! $tourismServProds->price !!}</td>
            <td>{!! $tourismServProds->is_available !!}</td>
            <td>{!! $tourismServProds->tel !!}</td>
            <td>{!! $tourismServProds->email !!}</td>
                <td>
                    {!! Form::open(['route' => ['tourismServProds.destroy', $tourismServProds->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tourismServProds.show', [$tourismServProds->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tourismServProds.edit', [$tourismServProds->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
