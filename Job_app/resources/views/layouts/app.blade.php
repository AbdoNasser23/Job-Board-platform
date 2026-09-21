<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Job Board')
    </title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/logo.jpg') }}">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            900: '#0a0a0f',
                            800: '#111118',
                            700: '#181821',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-dark-900 text-gray-100 antialiased min-h-screen">

    <!-- Navbar -->
    <header class="border-b border-white/10 bg-dark-800/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6">
            <div class="h-16 flex items-center justify-between">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2 group">

                    <div
                        class="w-9 h-9 rounded-lg bg-indigo-600
                                flex items-center justify-center
                                group-hover:bg-indigo-500 transition">

                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                        </svg>

                    </div>

                    <span class="text-xl font-bold tracking-tight">
                        Job<span class="text-indigo-500">Board</span>
                    </span>

                </a>

                <!-- Navigation -->
                <nav class="flex items-center gap-2">

                    @auth

                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 text-sm text-gray-300
                                  hover:text-white hover:bg-white/5
                                  rounded-lg transition">
                            Dashboard
                        </a>

                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="px-4 py-2 text-sm text-gray-300
                                           hover:text-red-400 hover:bg-white/5
                                           rounded-lg transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}"
                            class="px-4 py-2 text-sm text-gray-300
                                  hover:text-white transition">
                            Login
                        </a>

                        <a href="{{ url('/register') }}"
                            class="px-4 py-2 text-sm font-medium
                                  bg-indigo-600 hover:bg-indigo-500
                                  text-white rounded-lg transition">
                            Register
                        </a>

                    @endauth

                </nav>

            </div>
        </div>
    </header>


    <!-- Main Content -->
    <main class="min-h-[calc(100vh-4rem)]">

        @yield('content')

    </main>


    <!-- Footer -->
    <footer class="border-t border-white/10 bg-dark-800">

        <div class="max-w-7xl mx-auto px-6 py-6">

            <div class="flex flex-col sm:flex-row
                        items-center justify-between gap-4">

                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} JobBoard. All rights reserved.
                </p>

                <div class="flex items-center gap-5 text-sm text-gray-500">

                    <a href="#" class="hover:text-gray-300 transition">
                        About
                    </a>

                    <a href="#" class="hover:text-gray-300 transition">
                        Jobs
                    </a>

                    <a href="#" class="hover:text-gray-300 transition">
                        Contact
                    </a>

                </div>

            </div>

        </div>

    </footer>

</body>

</html>
