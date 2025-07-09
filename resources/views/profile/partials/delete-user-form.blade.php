<section class="bg-white p-6 rounded-lg shadow-md border border-green-200 space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-green-800">
            {{ __('Eliminar cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-green-700">
            {{ __('Una vez que elimines tu cuenta, todos tus datos serán borrados permanentemente. Asegúrate de descargar cualquier información importante antes de continuar.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 focus:ring-red-500">{{ __('Eliminar cuenta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}"
            class="p-6 bg-white rounded-lg shadow border border-red-200">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-red-700">
                {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}
            </h2>

            <p class="mt-1 text-sm text-red-600">
                {{ __('Una vez eliminada, no podrás recuperar tu cuenta ni ninguno de sus datos. Por favor, introduce tu contraseña para confirmar.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" :value="__('Contraseña')" class="text-red-700" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full border-red-300 focus:border-red-500 focus:ring-red-500"
                    placeholder="{{ __('Contraseña') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="mt-6 flex justify-end gap-4">
                <x-secondary-button x-on:click="$dispatch('close')"
                    class="border-green-300 text-green-700 hover:text-green-900">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500">
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>