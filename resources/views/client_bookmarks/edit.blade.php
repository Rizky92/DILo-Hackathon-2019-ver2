@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Bookmarks
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientBookmarks, ['route' => ['clientBookmarks.update', $clientBookmarks->id], 'method' => 'patch']) !!}

                        @include('client_bookmarks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection