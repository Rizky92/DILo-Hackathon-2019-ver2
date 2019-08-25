<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $clientTransactions->id !!}</p>
</div>

<!-- Client User Id Field -->
<div class="form-group">
    {!! Form::label('client_user_id', 'Client User Id:') !!}
    <p>{!! $clientTransactions->client_user_id !!}</p>
</div>

<!-- Tourism Serv Prod Id Field -->
<div class="form-group">
    {!! Form::label('tourism_serv_prod_id', 'Tourism Serv Prod Id:') !!}
    <p>{!! $clientTransactions->tourism_serv_prod_id !!}</p>
</div>

<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', 'Time:') !!}
    <p>{!! $clientTransactions->time !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{!! $clientTransactions->quantity !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $clientTransactions->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $clientTransactions->updated_at !!}</p>
</div>

