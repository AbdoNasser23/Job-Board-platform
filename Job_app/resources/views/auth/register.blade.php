@extends('layouts.app')

@section('title', 'Register - JobBoard')

@section('content')

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Create your account
                </h1>

                <p class="mt-2 text-gray-400">
                    Join JobBoard and find your next opportunity
                </p>
            </div>

            <div class="bg-dark-800 border border-white/10 rounded-2xl
                    p-8 shadow-xl">

                @if ($errors->any())
                    <div
                        class="mb-6 rounded-lg border border-red-500/20
                            bg-red-500/10 px-4 py-3 text-sm text-red-400">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                            Full name
                        </label>

                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            placeholder="John Doe"
                            class="w-full rounded-lg bg-dark-700 border border-white/10
                               px-4 py-3 text-white placeholder-gray-500
                               outline-none transition
                               focus:border-indigo-500 focus:ring-2
                               focus:ring-indigo-500/20">

                        @error('name')
                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email
                        </label>

                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            placeholder="you@example.com"
                            class="w-full rounded-lg bg-dark-700 border border-white/10
                               px-4 py-3 text-white placeholder-gray-500
                               outline-none transition
                               focus:border-indigo-500 focus:ring-2
                               focus:ring-indigo-500/20">

                        @error('email')
                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            Password
                        </label>

                        <input id="password" type="password" name="password" required placeholder="••••••••"
                            class="w-full rounded-lg bg-dark-700 border border-white/10
                               px-4 py-3 text-white placeholder-gray-500
                               outline-none transition
                               focus:border-indigo-500 focus:ring-2
                               focus:ring-indigo-500/20">

                        @error('password')
                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                            Confirm password
                        </label>

                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            placeholder="••••••••"
                            class="w-full rounded-lg bg-dark-700 border border-white/10
                               px-4 py-3 text-white placeholder-gray-500
                               outline-none transition
                               focus:border-indigo-500 focus:ring-2
                               focus:ring-indigo-500/20">
                    </div>

                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600 hover:bg-indigo-500
                           px-4 py-3 font-medium text-white
                           transition duration-200
                           focus:outline-none focus:ring-2
                           focus:ring-indigo-500/40">
                        Create account
                    </button>

                </form>

                <p class="mt-6 text-center text-sm text-gray-500">
                    Already have an account?

                    <a href="{{ url('/login') }}" class="text-indigo-400 hover:text-indigo-300">
                        Login
                    </a>
                </p>

            </div>

        </div>

    </div>

@endsection
