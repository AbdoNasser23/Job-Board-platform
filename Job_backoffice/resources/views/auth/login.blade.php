<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Job Board</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

    <div class="flex min-h-screen items-center justify-center px-4 py-12">

        <div class="w-full max-w-md">

            <div class="mb-8 text-center">

                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Job<span class="text-blue-600">Board</span>
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Sign in to your backoffice account
                </p>

            </div>


            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <div class="mb-6">

                    <h2 class="text-xl font-semibold text-slate-900">
                        Welcome back
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Enter your credentials to continue.
                    </p>

                </div>


                @if (session('status'))
                    <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                        {{ session('status') }}
                    </div>
                @endif


                <form method="POST" action="{{ route('login') }}" class="space-y-5">

                    @csrf


                    <div>

                        <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                            Email address
                        </label>

                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username" placeholder="you@example.com"
                            class="w-full rounded-lg border
                            {{ $errors->has('email') ? 'border-red-400 ring-2 ring-red-100' : 'border-slate-300' }}
                            bg-white px-3.5 py-2.5 text-sm text-slate-900 outline-none
                            transition placeholder:text-slate-400
                            focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <div>

                        <div class="mb-2 flex items-center justify-between">

                            <label for="password" class="block text-sm font-medium text-slate-700">
                                Password
                            </label>

                            <a href="{{ route('password.request') }}"
                                class="text-sm font-medium text-blue-600 hover:text-blue-700">
                                Forgot password?
                            </a>

                        </div>

                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full rounded-lg border
                            {{ $errors->has('password') ? 'border-red-400 ring-2 ring-red-100' : 'border-slate-300' }}
                            bg-white px-3.5 py-2.5 text-sm text-slate-900 outline-none
                            transition placeholder:text-slate-400
                            focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        @error('password')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <div class="flex items-center">

                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">

                        <label for="remember" class="ml-2 text-sm text-slate-600">
                            Remember me
                        </label>

                    </div>


                    <button type="submit"
                        class="w-full rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white
                        shadow-sm transition hover:bg-blue-700
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">

                        Sign in

                    </button>

                </form>

            </div>


            <p class="mt-6 text-center text-xs text-slate-400">
                Job Board Backoffice
            </p>

        </div>

    </div>

</body>

</html>
