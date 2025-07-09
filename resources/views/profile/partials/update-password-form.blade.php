<section class="bg-white p-6 rounded-lg shadow-md border border-green-200">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-green-800">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="mt-1 text-sm text-green-700">
            {{ __('Asegúrate de usar una contraseña larga y aleatoria para mantener tu cuenta segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Contraseña actual -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Contraseña actual')" class="text-green-800" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                          class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-600" />
        </div>

        <!-- Nueva contraseña -->
        <div>
            <x-input-label for="update_password_password" :value="__('Nueva contraseña')" class="text-green-800" />
            <x-text-input id="update_password_password" name="password" type="password"
                          class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirmar contraseña -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar contraseña')" class="text-green-800" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                          class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Botón guardar -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500">
                {{ __('Guardar cambios') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 3000)"
                   class="text-sm text-green-700">
                    {{ __('Guardado.') }}
                </p>
            @endif
        </div>
    </form>
</section>
