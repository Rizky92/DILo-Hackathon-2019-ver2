@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Event Categories
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tourismEventCategories, ['route' => ['tourismEventCategories.update', $tourismEventCategories->id], 'method' => 'patch']) !!}

                        @include('tourism_event_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection