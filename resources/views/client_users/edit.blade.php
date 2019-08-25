@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Users
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientUsers, ['route' => ['clientUsers.update', $clientUsers->id], 'method' => 'patch']) !!}

                        @include('client_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection