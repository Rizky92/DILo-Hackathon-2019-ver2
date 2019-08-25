<!-- Client User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_user_id', 'Client User Id:') !!}
    {!! Form::select('client_user_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientScores.index') !!}" class="btn btn-default">Cancel</a>
</div>
