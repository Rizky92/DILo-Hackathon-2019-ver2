@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Profiles
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientProfiles, ['route' => ['clientProfiles.update', $clientProfiles->id], 'method' => 'patch']) !!}

                        @include('client_profiles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection