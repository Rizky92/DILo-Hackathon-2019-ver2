@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Reviews
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientReviews, ['route' => ['clientReviews.update', $clientReviews->id], 'method' => 'patch']) !!}

                        @include('client_reviews.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection