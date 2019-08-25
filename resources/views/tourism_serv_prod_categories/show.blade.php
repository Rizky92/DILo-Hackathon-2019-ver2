@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tourism Serv Prod Categories
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('tourism_serv_prod_categories.show_fields')
                    <a href="{!! route('tourismServProdCategories.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
