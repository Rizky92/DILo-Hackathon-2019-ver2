<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $clientHistories->id !!}</p>
</div>

<!-- Client User Id Field -->
<div class="form-group">
    {!! Form::label('client_user_id', 'Client User Id:') !!}
    <p>{!! $clientHistories->client_user_id !!}</p>
</div>

<!-- Tourism Dest Id Field -->
<div class="form-group">
    {!! Form::label('tourism_dest_id', 'Tourism Dest Id:') !!}
    <p>{!! $clientHistories->tourism_dest_id !!}</p>
</div>

<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', 'Time:') !!}
    <p>{!! $clientHistories->time !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $clientHistories->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $clientHistories->updated_at !!}</p>
</div>

