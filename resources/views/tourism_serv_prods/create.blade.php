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
                    {!! Form::open(['route' => 'tourismServProds.store']) !!}

                        @include('tourism_serv_prods.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
