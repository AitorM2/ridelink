<section class="bg-white p-6 rounded-lg shadow-md border border-green-200">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-green-800">
            {{ __('Información de perfil') }}
        </h2>

        <p class="mt-1 text-sm text-green-700">
            {{ __("Actualiza tu nombre, correo electrónico y tu imagen de perfil.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Nombre -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" class="text-green-800" />
            <x-text-input id="name" name="name" type="text"
                          class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Imagen de perfil -->
        <div x-data="{ preview: null }">
            <x-input-label for="profile_photo" :value="__('Imagen de perfil')" class="text-green-800 mb-2" />

            <div class="flex items-center space-x-4">
                <!-- Imagen previa o actual -->
                <div class="relative">
                    <template x-if="preview">
                        <img :src="preview" alt="Preview"
                             class="h-20 w-20 rounded-full object-cover ring-2 ring-green-500 shadow-md">
                    </template>

                    @if ($user->profile_photo_path)
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto actual"
                             x-show="!preview"
                             class="h-20 w-20 rounded-full object-cover ring-2 ring-green-300 shadow-sm">
                    @else
                        <div x-show="!preview"
                             class="h-20 w-20 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold ring-2 ring-green-200 shadow-sm">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <!-- Botón de selección -->
                <label for="profile_photo"
                       class="cursor-pointer inline-block px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md shadow hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-500">
                    {{ __('Seleccionar imagen') }}
                </label>

                <input id="profile_photo" name="profile_photo" type="file" accept="image/*"
                       class="hidden"
                       @change="preview = URL.createObjectURL($event.target.files[0])" />
            </div>

            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Correo electrónico -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" class="text-green-800" />
            <x-text-input id="email" name="email" type="email"
                          class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2 text-sm text-green-700">
                    {{ __('Tu correo electrónico no está verificado.') }}

                    <button form="send-verification"
                            class="underline ml-1 text-green-600 hover:text-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                        {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Botón guardar -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500">
                {{ __('Guardar cambios') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
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
