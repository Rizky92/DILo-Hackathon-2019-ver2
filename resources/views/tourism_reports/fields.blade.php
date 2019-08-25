<!-- Tourism Dest Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tourism_dest_id', 'Tourism Dest Id:') !!}
    {!! Form::select('tourism_dest_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Target Field -->
<div class="form-group col-sm-6">
    {!! Form::label('target', 'Target:') !!}
    {!! Form::number('target', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Of Res Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_of_res', 'Num Of Res:') !!}
    {!! Form::number('num_of_res', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Of Visits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_of_visits', 'Num Of Visits:') !!}
    {!! Form::number('num_of_visits', null, ['class' => 'form-control']) !!}
</div>

<!-- Income Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income', 'Income:') !!}
    {!! Form::number('income', null, ['class' => 'form-control']) !!}
</div>

<!-- Costs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costs', 'Costs:') !!}
    {!! Form::number('costs', null, ['class' => 'form-control']) !!}
</div>

<!-- Profit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profit', 'Profit:') !!}
    {!! Form::number('profit', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tourismReports.index') !!}" class="btn btn-default">Cancel</a>
</div>
