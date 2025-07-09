@extends('layouts.web')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Mis Empresas</h1>
        <a href="{{ route('companies.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
            + Nueva Empresa
        </a>
    </div>

    @if (Auth::user()->companies->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg">
            <p>No tienes empresas registradas.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach (Auth::user()->companies as $company)
                <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">
                    {{-- Imagen de la empresa o por defecto --}}
                    <div class="mb-4">
                        <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('img/default-company.jpg') }}"
                             alt="Logo de {{ $company->name }}"
                             class="w-full h-60 object-cover rounded-md">
                    </div>

                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $company->name }}</h2>
                    </div>
                    <p class="text-gray-600 mt-2">Ciudad: {{ $company->city ?? 'No especificada' }}</p>
                    <p class="text-gray-600 mt-2">Código postal: {{ $company->postal_code ?? 'No especificado' }}</p>
                    <p class="text-gray-600">Dirección: {{ $company->address ?? 'No especificada' }}</p>
                    <div class="mt-4">
                        <a href="{{ route('companies.show', $company) }}"
                           class="text-blue-600 hover:underline text-sm font-medium">
                            Ver detalles →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
