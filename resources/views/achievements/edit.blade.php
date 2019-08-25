@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Achievements
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($achievements, ['route' => ['achievements.update', $achievements->id], 'method' => 'patch']) !!}

                        @include('achievements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection