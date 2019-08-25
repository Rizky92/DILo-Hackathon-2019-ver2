<!-- Tourism Event Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tourism_event_id', 'Tourism Event Id:') !!}
    {!! Form::select('tourism_event_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
</div>

<!-- Presenter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('presenter', 'Presenter:') !!}
    {!! Form::text('presenter', null, ['class' => 'form-control']) !!}
</div>

<!-- Misc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('misc', 'Misc:') !!}
    {!! Form::text('misc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tourismEventRundowns.index') !!}" class="btn btn-default">Cancel</a>
</div>
