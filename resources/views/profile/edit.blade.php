<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-300 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Contenedor con tarjetas en fila -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tarjeta 1 -->
                <div class="p-6 bg-white dark:bg-gray-900 border border-green-200 dark:border-green-800 shadow-lg rounded-lg">
                    <h3 class="text-lg font-bold text-green-600 mb-4">Actualizar Información</h3>
                    <div>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="p-6 bg-white dark:bg-gray-900 border border-green-200 dark:border-green-800 shadow-lg rounded-lg">
                    <h3 class="text-lg font-bold text-green-600 mb-4">Actualizar Contraseña</h3>
                    <div>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="p-6 bg-white dark:bg-gray-900 border border-green-200 dark:border-green-800 shadow-lg rounded-lg">
                    <h3 class="text-lg font-bold text-green-600 mb-4">Eliminar Cuenta</h3>
                    <div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
