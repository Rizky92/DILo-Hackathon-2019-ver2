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

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientBookmarks.index') !!}" class="btn btn-default">Cancel</a>
</div>
