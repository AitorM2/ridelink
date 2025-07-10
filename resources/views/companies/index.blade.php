@extends('layouts.web')

@section('content')
<div class="container mx-auto p-6">
    <div class="table-gradient table-gradient-components flex items-center justify-between">
        <h1 class="text-3xl ml-2 font-bold">Mis Empresas</h1>
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
            type="button"><i class="fa-solid fa-ellipsis"></i></button>
        <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                <li><a href="{{ route('companies.create') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Añadir una empresa</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 rounded-bl-lg rounded-br-lg border border-gray-200 p-5 bg-white">
        @if (Auth::user()->companies->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded-xl border border-yellow-300">
                No tienes empresas registradas.
            </div>
        @else
            @foreach (Auth::user()->companies as $company)
                <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
                    <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('img/default-company.jpg') }}"
                         alt="Logo de {{ $company->name }}"
                         class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $company->name }}</h2>
                            <div class="relative">
                                <button id="dropdownDefaultButton-{{ $company->id }}"
                                    data-dropdown-toggle="dropdown-{{ $company->id }}"
                                    class="text-black focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-1 inline-flex items-center"
                                    type="button">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div id="dropdown-{{ $company->id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700"
                                        aria-labelledby="dropdownDefaultButton-{{ $company->id }}">
                                        <li>
                                            <a href="{{ route('companies.edit', $company) }}"
                                                class="block px-4 py-2 hover:bg-gray-100">Editar empresa</a>
                                        </li>
                                        <li>
                                            <button data-modal-target="popup-modal-{{ $company->id }}"
                                                data-modal-toggle="popup-modal-{{ $company->id }}"
                                                class="block px-4 py-2 hover:bg-gray-100 w-full text-left">Eliminar empresa</button>
                                        </li>
                                        <li>
                                            <a href="{{ route('companies.show', $company) }}"
                                                class="block px-4 py-2 hover:bg-gray-100">Ver detalles</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">Ciudad: {{ $company->city ?? 'No especificada' }}</p>
                        <p class="text-gray-600">Código postal: {{ $company->postal_code ?? 'No especificado' }}</p>
                        <p class="text-gray-600">Dirección: {{ $company->address ?? 'No especificada' }}</p>
                    </div>
                </div>
                <div id="popup-modal-{{ $company->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal-{{ $company->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Cerrar</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que quieres eliminar esta empresa?</h3>
                                <div class="flex justify-center gap-2 mt-4">
                                    <form method="POST" action="{{ route('companies.destroy', $company) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Sí, estoy seguro
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-modal-{{ $company->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
