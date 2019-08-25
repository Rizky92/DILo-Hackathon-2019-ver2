@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Destinations
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tourismDestinations, ['route' => ['tourismDestinations.update', $tourismDestinations->id], 'method' => 'patch']) !!}

                        @include('tourism_destinations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection