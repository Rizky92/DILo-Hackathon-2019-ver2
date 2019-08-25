<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Tourism Event Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tourism_event_cat_id', 'Tourism Event Cat Id:') !!}
    {!! Form::select('tourism_event_cat_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Event Holder Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event_holder_name', 'Event Holder Name:') !!}
    {!! Form::text('event_holder_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Event Holder Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event_holder_tel', 'Event Holder Tel:') !!}
    {!! Form::text('event_holder_tel', null, ['class' => 'form-control']) !!}
</div>

<!-- Event Holder Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event_holder_email', 'Event Holder Email:') !!}
    {!! Form::email('event_holder_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_start', 'Date Start:') !!}
    {!! Form::date('date_start', null, ['class' => 'form-control','id'=>'date_start']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date_start').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Date End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_end', 'Date End:') !!}
    {!! Form::date('date_end', null, ['class' => 'form-control','id'=>'date_end']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date_end').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Quota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quota', 'Quota:') !!}
    {!! Form::number('quota', null, ['class' => 'form-control']) !!}
</div>

<!-- Tourism Dest Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tourism_dest_id', 'Tourism Dest Id:') !!}
    {!! Form::select('tourism_dest_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tourismEvents.index') !!}" class="btn btn-default">Cancel</a>
</div>
