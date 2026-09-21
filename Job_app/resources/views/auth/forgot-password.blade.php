@extends('layouts.app')

@section('title', 'Forgot Password - JobBoard')

@section('content')

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">

                <div
                    class="mx-auto mb-5 w-14 h-14 rounded-2xl
                        bg-indigo-500/10 border border-indigo-500/20
                        flex items-center justify-center">

                    <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-11.472 2.472L4 15v4h4l2-2h2l2-2h2a6 6 0 003-10.472" />
                    </svg>

                </div>

                <h1 class="text-3xl font-bold text-white">
                    Forgot password?
                </h1>

                <p class="mt-2 text-gray-400">
                    Enter your email and we'll send you a reset link.
                </p>

            </div>

            <div class="bg-dark-800 border border-white/10 rounded-2xl
                    p-8 shadow-xl">

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

                <form method="POST" action="{{ url('/forgot-password') }}" class="space-y-5">

                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email address
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

                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600 hover:bg-indigo-500
                           px-4 py-3 font-medium text-white transition">
                        Send reset link
                    </button>

                </form>

                <div class="mt-6 text-center">

                    <a href="{{ url('/login') }}" class="text-sm text-gray-400 hover:text-white transition">
                        ← Back to login
                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection
