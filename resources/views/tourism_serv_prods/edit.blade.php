@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Serv Prods
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tourismServProds, ['route' => ['tourismServProds.update', $tourismServProds->id], 'method' => 'patch']) !!}

                        @include('tourism_serv_prods.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection