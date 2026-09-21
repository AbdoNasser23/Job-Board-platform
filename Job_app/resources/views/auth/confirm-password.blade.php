@extends('layouts.app')

@section('title', 'Confirm Password - JobBoard')

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
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>

                </div>

                <h1 class="text-3xl font-bold text-white">
                    Confirm your password
                </h1>

                <p class="mt-2 text-gray-400">
                    Please confirm your password before continuing.
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

                <form method="POST" action="{{ url('/password/confirm') }}" class="space-y-5">

                    @csrf

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            Password
                        </label>

                        <input id="password" type="password" name="password" required autofocus placeholder="••••••••"
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

                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600
                           hover:bg-indigo-500 px-4 py-3
                           font-medium text-white transition">
                        Confirm password
                    </button>

                </form>

            </div>

        </div>

    </div>

@endsection
