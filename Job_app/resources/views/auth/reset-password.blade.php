@extends('layouts.app')

@section('title', 'Reset Password - JobBoard')

@section('content')

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold text-white">
                    Reset password
                </h1>

                <p class="mt-2 text-gray-400">
                    Choose a new password for your account.
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

                <form method="POST" action="{{ url('/reset-password') }}" class="space-y-5">

                    @csrf

                    <input type="hidden" name="token" value="{{ $token ?? request('token') }}">

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email
                        </label>

                        <input id="email" type="email" name="email" value="{{ old('email', request('email')) }}"
                            required autofocus
                            class="w-full rounded-lg bg-dark-700 border border-white/10
                               px-4 py-3 text-white
                               outline-none transition
                               focus:border-indigo-500 focus:ring-2
                               focus:ring-indigo-500/20">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            New password
                        </label>

                        <input id="password" type="password" name="password" required
                            class="w-full rounded-lg bg-dark-700 border border-white/10
                               px-4 py-3 text-white
                               outline-none transition
                               focus:border-indigo-500 focus:ring-2
                               focus:ring-indigo-500/20">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                            Confirm new password
                        </label>

                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full rounded-lg bg-dark-700 border border-white/10
                               px-4 py-3 text-white
                               outline-none transition
                               focus:border-indigo-500 focus:ring-2
                               focus:ring-indigo-500/20">
                    </div>

                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600 hover:bg-indigo-500
                           px-4 py-3 font-medium text-white transition">
                        Reset password
                    </button>

                </form>

            </div>

        </div>

    </div>

@endsection
