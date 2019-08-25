@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rewards
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rewards, ['route' => ['rewards.update', $rewards->id], 'method' => 'patch']) !!}

                        @include('rewards.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection