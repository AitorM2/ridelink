@extends('layouts.web')

@section('content')
{{ html()->form('POST', route('companies.store'))->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="container mx-auto px-4 py-8">
        <div class="table-gradient table-gradient-components">
            <h1 class="form-title">{{ __("Crear una empresa") }}</h1>
        </div>
        <div class="form-container">
            @include('companies.form', [$btnform = __('Crear empresa')])
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection