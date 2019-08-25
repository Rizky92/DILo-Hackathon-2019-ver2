<!-- Client User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_user_id', 'Client User Id:') !!}
    {!! Form::select('client_user_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Tourism Dest Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tourism_dest_id', 'Tourism Dest Id:') !!}
    {!! Form::select('tourism_dest_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientHistories.index') !!}" class="btn btn-default">Cancel</a>
</div>
