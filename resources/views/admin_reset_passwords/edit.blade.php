@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Admin Reset Passwords
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($adminResetPasswords, ['route' => ['adminResetPasswords.update', $adminResetPasswords->id], 'method' => 'patch']) !!}

                        @include('admin_reset_passwords.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection