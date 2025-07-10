@extends('layouts.web')

@section('content')
{{ html()->form('POST', route('fleets.store'))->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="container mx-auto px-4 py-8">
        <div class="table-gradient table-gradient-components">
            <h1 class="form-title">{{ __("Añadir vehiculo a la flota") }}</h1>
        </div>
        <div class="form-container">
            @include('fleets.form', [$btnform = __('Añadir vehiculo')])
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection