<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Job Board Backoffice')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    <div class="min-h-screen">

        <aside class="fixed inset-y-0 left-0 z-40 hidden w-64 border-r border-slate-200 bg-white lg:block">

            <div class="flex h-16 items-center border-b border-slate-200 px-6">
                <span class="text-xl font-bold tracking-tight text-slate-900">
                    Job<span class="text-blue-600">Board</span>
                </span>
            </div>

            <div class="p-4">

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Main
                </p>

                <nav class="space-y-1">

                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 rounded-lg bg-blue-50 px-3 py-2.5 text-sm font-medium text-blue-700">
                        Dashboard
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                        Companies
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                        Job Vacancies
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                        Applications
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                        Users
                    </a>

                </nav>

                <p class="mb-3 mt-8 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Management
                </p>

                <nav class="space-y-1">

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                        Categories
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                        Analytics
                    </a>

                </nav>

            </div>

        </aside>


        <div class="lg:pl-64">

            <header
                class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-4 sm:px-6">

                <h1 class="text-lg font-semibold text-slate-900">
                    @yield('page-title', 'Dashboard')
                </h1>

                <div class="flex items-center gap-4">

                    <div class="hidden h-7 w-px bg-slate-200 sm:block"></div>

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-100 text-sm font-semibold text-blue-700">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>

                        <div class="hidden sm:block">
                            <p class="text-sm font-semibold text-slate-800">
                                {{ auth()->user()->name ?? 'Admin' }}
                            </p>

                            <p class="text-xs text-slate-500">
                                {{ auth()->user()->role ?? 'Administrator' }}
                            </p>
                        </div>

                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="rounded-lg px-3 py-2 text-sm font-medium text-slate-500 transition hover:bg-red-50 hover:text-red-600">
                            Logout
                        </button>
                    </form>

                </div>

            </header>


            <main class="p-4 sm:p-6 lg:p-8">

                @if (session('success'))
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>
