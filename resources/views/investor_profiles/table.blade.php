<div class="table-responsive">
    <table class="table" id="investorProfiles-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Address</th>
        <th>Coords</th>
        <th>Ceo Name</th>
        <th>Email</th>
        <th>Tel</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($investorProfiles as $investorProfiles)
            <tr>
                <td>{!! $investorProfiles->name !!}</td>
            <td>{!! $investorProfiles->description !!}</td>
            <td>{!! $investorProfiles->address !!}</td>
            <td>{!! $investorProfiles->coords !!}</td>
            <td>{!! $investorProfiles->ceo_name !!}</td>
            <td>{!! $investorProfiles->email !!}</td>
            <td>{!! $investorProfiles->tel !!}</td>
                <td>
                    {!! Form::open(['route' => ['investorProfiles.destroy', $investorProfiles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('investorProfiles.show', [$investorProfiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('investorProfiles.edit', [$investorProfiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
