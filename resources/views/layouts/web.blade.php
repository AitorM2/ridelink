<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RideLink') }}</title>
    <link rel="icon" href="{{ asset('img/ridelink_logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex min-h-screen bg-green-50">

        <!-- Sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-white border-r border-green-200 shadow-lg">
            <div class="flex items-center justify-center h-16 border-b border-green-100 px-4">
                <img src="/img/ridelink_logo.png" class="h-10 w-10 mr-2" alt="Logo">
                <span class="text-lg  font-semibold text-green-800">RideLink</span>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition"
                    :class="{ 'bg-green-100 font-semibold': current === 'dashboard' }">
                    <i class="fas fa-tachometer-alt mr-3 w-5 text-green-700"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('companies.index') }}"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition"
                    :class="{ 'bg-green-100 font-semibold': current === 'profile' }">
                    <i class="fa-solid fa-building mr-3 w-5 text-green-700"></i>
                    <span>Empresas</span>
                </a>

                <a href="{{ route('fleets.index') }}"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition"
                    :class="{ 'bg-green-100 font-semibold': current === 'settings' }">
                    <i class="fa-solid fa-car-side mr-3 w-5 text-green-700"></i>
                    <span>Vehiculos</span>
                </a>

                <a href="#logout"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition">
                    <i class="fas fa-sign-out-alt mr-3 w-5 text-green-700"></i>
                    <span>Cerrar sesión</span>
                </a>
            </nav>
        </div>

        <!-- Mobile menu toggle -->
        <div class="md:hidden fixed top-4 left-4 z-40">
            <button id="toggleSidebar"
                class="text-green-700 hover:text-green-900 focus:outline-none focus:ring-2 focus:ring-green-400 p-2 rounded-md bg-white shadow z-[60] relative">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>

        <!-- Sidebar para móviles -->
        <div id="mobileSidebar"
            class="fixed inset-y-0 left-0 w-64 bg-white border-r border-green-200 shadow-lg transform -translate-x-full transition-transform duration-200 z-40 md:hidden">
            <div class="flex items-center justify-between h-16 border-b px-4 pr-6 relative z-40 bg-white">
                <div class="flex items-center">
                    <img src="/img/ridelink_logo.png" class="h-10 w-10 mr-2" alt="Logo">
                    <span class="text-lg font-semibold text-green-800">RideLink</span>
                </div>
                <button id="closeSidebar" class="text-green-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition">
                    <i class="fas fa-tachometer-alt mr-3 w-5 text-green-700"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('companies.index') }}"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition">
                    <i class="fas fa-user mr-3 w-5 text-green-700"></i>
                    <span>Empresas</span>
                </a>
                <a href="{{ route('fleets.index') }}"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition">
                    <i class="fa-solid fa-car-side mr-3 w-5 text-green-700"></i>
                    <span>Vehiculos</span>
                </a>
                <a href="#logout"
                    class="flex items-center px-4 py-2 text-green-800 rounded-md hover:bg-green-100 transition">
                    <i class="fas fa-sign-out-alt mr-3 w-5 text-green-700"></i>
                    <span>Cerrar sesión</span>
                </a>
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-6">
            <!-- Encabezado de usuario -->
            <div class="flex justify-end mb-6 relative">
                <div class="relative">
                    <button id="userDropdownToggle"
                        class="flex items-center space-x-2 px-3 py-2 bg-white border border-green-200 rounded-full shadow hover:bg-green-100 transition">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Foto de perfil"
                                class="h-8 w-8 rounded-full object-cover ring-2 ring-green-400">
                        @else
                            <div
                                class="h-8 w-8 bg-green-600 text-white flex items-center justify-center rounded-full font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <span class="text-green-800 font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-green-700 ml-1"></i>
                    </button>

                    <!-- Dropdown -->
                    <div id="userDropdownMenu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white border border-green-200 rounded-md shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-green-800 hover:bg-green-100 transition">
                            <i class="fas fa-user mr-2 text-green-600"></i> Perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-green-800 hover:bg-green-100 transition">
                                <i class="fas fa-sign-out-alt mr-2 text-green-600"></i> Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Notificicaciones -->
            @if (session('success'))
                <div id="toast-success" class="success-notify" role="alert">
                    <div
                        class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal"> {{ session('success') }}</div>
                    <button type="button" class="success-notify-closebtn" data-dismiss-target="#toast-success"
                        aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Fin notificaciones -->
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
    <script>
        document.getElementById('toggleSidebar')?.addEventListener('click', () => {
            document.getElementById('mobileSidebar').classList.remove('-translate-x-full');
        });

        document.getElementById('closeSidebar')?.addEventListener('click', () => {
            document.getElementById('mobileSidebar').classList.add('-translate-x-full');
        });

        document.getElementById('userDropdownToggle')?.addEventListener('click', function () {
            const menu = document.getElementById('userDropdownMenu');
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            const menu = document.getElementById('userDropdownMenu');
            const button = document.getElementById('userDropdownToggle');
            if (!button.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>