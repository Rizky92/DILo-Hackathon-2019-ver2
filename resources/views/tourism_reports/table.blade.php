<div class="table-responsive">
    <table class="table" id="tourismReports-table">
        <thead>
            <tr>
                <th>Tourism Dest Id</th>
        <th>Target</th>
        <th>Num Of Res</th>
        <th>Num Of Visits</th>
        <th>Income</th>
        <th>Costs</th>
        <th>Profit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tourismReports as $tourismReports)
            <tr>
                <td>{!! $tourismReports->tourism_dest_id !!}</td>
            <td>{!! $tourismReports->target !!}</td>
            <td>{!! $tourismReports->num_of_res !!}</td>
            <td>{!! $tourismReports->num_of_visits !!}</td>
            <td>{!! $tourismReports->income !!}</td>
            <td>{!! $tourismReports->costs !!}</td>
            <td>{!! $tourismReports->profit !!}</td>
                <td>
                    {!! Form::open(['route' => ['tourismReports.destroy', $tourismReports->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tourismReports.show', [$tourismReports->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tourismReports.edit', [$tourismReports->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
