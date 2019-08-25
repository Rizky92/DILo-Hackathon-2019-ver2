@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Dest Categories
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tourismDestCategories, ['route' => ['tourismDestCategories.update', $tourismDestCategories->id], 'method' => 'patch']) !!}

                        @include('tourism_dest_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection