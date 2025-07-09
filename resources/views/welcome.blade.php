<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'RideLink') }}</title>
    <link rel="icon" href="{{ asset('img/ridelink_logo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="/img/ridelink_logo.png" alt="Logo ridelink" class="h-16">
                <span class="ml-3 text-xl font-bold text-gray-800">RideLink</span>
            </div>

            <!-- Desktop menu -->

            <nav class="hidden md:flex space-x-8 md:items-center md:space-x-8" id="desktop-menu">
                <a href="#" class="welcome-nav-a">Inicio</a>
                <a href="#" class="welcome-nav-a">Servicios</a>
                <a href="#" class="welcome-nav-a">Portafolio</a>
                <a href="#" class="welcome-nav-a">Contacto</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="welcome-nav-a">
                            Ir a la web
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="welcome-nav-a">
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="welcome-nav-a">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
            <button id="hamburger-toggle" class="md:hidden text-gray-600">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Movile menu -->

        <div id="mobile-menu"
            class="hidden flex-col bg-white w-full px-6 py-4 space-y-4 md:hidden shadow-md absolute top-20 left-0 z-50">
            <a href="#" class="welcome-nav-a block">Inicio</a>
            <a href="#" class="welcome-nav-a block">Servicios</a>
            <a href="#" class="welcome-nav-a block">Portafolio</a>
            <a href="#" class="welcome-nav-a block">Contacto</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="welcome-nav-a block">
                        Ir a la web
                    </a>
                @else
                    <a href="{{ route('login') }}" class="welcome-nav-a block">
                        Iniciar Sesión
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="welcome-nav-a block">
                            Registrarse
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient text-white">
        <div class="container mx-auto px-6 py-20 md:py-32">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">Gestiona tu flota de coches</h1>
                    <p class="text-xl mb-8 opacity-90">Gestiona de forma sencilla e intuitiva la flota de tus vehiculos, 
                        ya sean de alquiler o comprados. Nuestra plataforma te permite llevar un control total de tus
                        vehículos, optimizando la gestión y mejorando la eficiencia operativa.</p>
                    <div class="flex space-x-4">
                        @if(Route::has('login'))
                            <a href="{{ route('login') }}">
                                <button
                                    class="bg-white text-green-700 px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 transition-all">Comenzar</button></a>
                        @endif
                        <button
                            class="border-2 border-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:bg-opacity-10 transition-all">Saber
                            más</button>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/522befec-3202-425d-a8ee-46cdcce860db.png"
                        alt="Interfaz moderna de aplicación web mostrando gráficos y dashboard organizado"
                        class="rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Sobre la aplicación</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Ofrecemos una solución rápida, sencilla y eficaz para la gestión de tu flota</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-xl shadow-md transition-all">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-laptop-code text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Rapidez</h3>
                    <p class="text-gray-600">Usa la aplicación para gestionar de forma eficaz todo lo necesario</p>
                </div>
                <div class="feature-card bg-white p-8 rounded-xl shadow-md transition-all">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Desarrollo Móvil</h3>
                    <p class="text-gray-600">Aplicaciones nativas e híbridas para iOS y Android.</p>
                </div>
                <div class="feature-card bg-white p-8 rounded-xl shadow-md transition-all">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Marketing Digital</h3>
                    <p class="text-gray-600">Estrategias para aumentar tu presencia y conversiones en línea.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl p-12 text-white">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="md:w-2/3 mb-6 md:mb-0">
                        <h2 class="text-2xl md:text-3xl font-bold mb-3">¿Listo para transformar tu negocio?</h2>
                        <p class="opacity-90">Contáctanos hoy mismo para una consulta gratuita.</p>
                    </div>
                    <button
                        class="bg-white text-green-700 px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 transition-all">Agendar
                        Llamada</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center mb-4">
                        <img src="/img/ridelink_logo.png" alt="Logo ridelink" class="h-12 mr-2">
                        <span class="text-white font-semibold">Ridelink</span>
                    </div>
                    <p class="mb-4">Transformando ideas en experiencias digitales exitosas.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-600 transition-all"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-sky-600 transition-all"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-pink-600 transition-all"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-800 transition-all"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Enlaces</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="welcome-footer-a">Inicio</a></li>
                        <li><a href="#" class="welcome-footer-a">Servicios</a></li>
                        <li><a href="#" class="welcome-footer-a">Nosotros</a></li>
                        <li><a href="#" class="welcome-footer-a">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-sm text-center">
                <p>&copy; {{ date('Y') }} RideLink. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle menú móvil tipo dropdown
        const toggleButton = document.getElementById('hamburger-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>