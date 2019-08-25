<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $adminResetPasswords->id !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $adminResetPasswords->email !!}</p>
</div>

<!-- Reset Token Field -->
<div class="form-group">
    {!! Form::label('reset_token', 'Reset Token:') !!}
    <p>{!! $adminResetPasswords->reset_token !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $adminResetPasswords->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $adminResetPasswords->updated_at !!}</p>
</div>

