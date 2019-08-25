@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Event Rundowns
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'tourismEventRundowns.store']) !!}

                        @include('tourism_event_rundowns.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
