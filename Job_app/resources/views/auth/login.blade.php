
@extends('layouts.app')

@section('title', 'Login - JobBoard')

@section('content')

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Welcome back
                </h1>

                <p class="mt-2 text-gray-400">
                    Login to your JobBoard account
                </p>
            </div>

            <div class="bg-dark-800 border border-white/10 rounded-2xl p-8 shadow-xl">

                @if (session('status'))
                    <div
                        class="mb-6 rounded-lg border border-green-500/20
                            bg-green-500/10 px-4 py-3 text-sm text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        class="mb-6 rounded-lg border border-red-500/20
                            bg-red-500/10 px-4 py-3 text-sm text-red-400">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email
                        </label>

                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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
                        <div class="flex items-center justify-between mb-2">

                            <label for="password" class="text-sm font-medium text-gray-300">
                                Password
                            </label>

                            <a href="{{ url('/forgot-password') }}" class="text-sm text-indigo-400 hover:text-indigo-300">
                                Forgot password?
                            </a>

                        </div>

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

                    <div class="flex items-center gap-2">

                        <input id="remember" type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-white/10
                               bg-dark-700 text-indigo-600
                               focus:ring-indigo-500">

                        <label for="remember" class="text-sm text-gray-400">
                            Remember me
                        </label>

                    </div>

                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600 hover:bg-indigo-500
                           px-4 py-3 font-medium text-white
                           transition duration-200
                           focus:outline-none focus:ring-2
                           focus:ring-indigo-500/40">
                        Login
                    </button>

                </form>

                <div class="relative my-7">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/10"></div>
                    </div>

                    <div class="relative flex justify-center">
                        <span class="bg-dark-800 px-3 text-sm text-gray-500">
                            Don't have an account?
                        </span>
                    </div>
                </div>

                <a href="{{ url('/register') }}"
                    class="block w-full text-center rounded-lg border
                      border-white/10 px-4 py-3 font-medium
                      text-gray-300 hover:bg-white/5 hover:text-white
                      transition">
                    Create an account
                </a>

            </div>

        </div>

    </div>

@endsection
