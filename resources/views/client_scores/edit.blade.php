@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Scores
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientScores, ['route' => ['clientScores.update', $clientScores->id], 'method' => 'patch']) !!}

                        @include('client_scores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection