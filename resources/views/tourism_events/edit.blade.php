@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Events
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tourismEvents, ['route' => ['tourismEvents.update', $tourismEvents->id], 'method' => 'patch']) !!}

                        @include('tourism_events.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection