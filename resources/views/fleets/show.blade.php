@extends('layouts.web')

@section('content')
    <div class="container mx-auto p-6">
        <div class="table-gradient table-gradient-components">
            <h1 class="text-3xl ml-2 font-bold">Información detallada del vehiculo
                {{ $fleet->car_name . ' ' . $fleet->car_model}}
            </h1>
        </div>
        <div class="bg-white shadow-md rounded-b-lg p-6">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-300">
                <img src="{{ $fleet->car_image ? asset('storage/' . $fleet->car_image) : asset('img/default-company.jpg') }}"
                    alt="Foto de {{ $fleet->car_name . ' ' . $fleet->car_model }}"
                    class="w-full h-120 object-cover mx-auto rounded-t-lg" />
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $fleet->car_name }}</h1>
                    <div class="mb-4">
                        <p class="text-gray-700"><span class="font-semibold">Modelo:</span> {{ $fleet->car_model }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Matrícula:</span> {{ $fleet->car_plate }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Color:</span> {{ $fleet->car_color ?? '-' }}
                        </p>
                        <p class="text-gray-700"><span class="font-semibold">VIN:</span> {{ $fleet->car_vin ?? '-' }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Kilómetros:</span>
                            {{ $fleet->kilometers ?? '-' }}
                        </p>
                    </div>
                    <h2 class="text-xl font-semibold text-green-800 mb-2 mt-6">Empresa</h2>
                    @if($fleet->company)
                        <div class="flex items-center mb-2">
                            <img src="{{ $fleet->company->logo ? asset('storage/' . $fleet->company->logo) : asset('img/default-company.jpg') }}"
                                alt="Logo empresa" class="h-12 w-12 rounded-full mr-3 object-cover border" />
                            <div>
                                <p class="font-semibold text-gray-800">{{ $fleet->company->name }}</p>
                                <p class="text-gray-600 text-sm">{{ $fleet->company->email }}</p>
                                <p class="text-gray-600 text-sm">{{ $fleet->company->phone }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700"><span class="font-semibold">Dirección:</span> {{ $fleet->company->address }},
                            {{ $fleet->company->city }}, {{ $fleet->company->state }}, {{ $fleet->company->postal_code }},
                            {{ $fleet->company->country }}
                        </p>
                        <p class="text-gray-700 mt-2"><span class="font-semibold">Descripción:</span>
                            {{ $fleet->company->description ?? '-' }}</p>
                    @else
                        <p class="text-red-600">Sin empresa asociada.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection