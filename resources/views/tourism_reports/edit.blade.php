@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Reports
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tourismReports, ['route' => ['tourismReports.update', $tourismReports->id], 'method' => 'patch']) !!}

                        @include('tourism_reports.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection