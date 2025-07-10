@extends('layouts.web')

@section('content')
{{ html()->model($fleet)->form('PUT', route('fleets.update', $fleet))->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="container mx-auto px-4 py-8">
        <div class="table-gradient table-gradient-components">
            <h1 class="form-title">{{ __("Modificar vehiculo de la flota") }}</h1>
        </div>
        <div class="form-container">
            @include('fleets.form', [$btnform = __('Actualizar vehiculo')])
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection