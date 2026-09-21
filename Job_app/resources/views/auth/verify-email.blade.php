@extends('layouts.app')

@section('title', 'Verify Email - JobBoard')

@section('content')

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md text-center">

            <div class="bg-dark-800 border border-white/10 rounded-2xl
                    p-8 shadow-xl">

                <div
                    class="mx-auto mb-6 w-16 h-16 rounded-2xl
                        bg-indigo-500/10 border border-indigo-500/20
                        flex items-center justify-center">

                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>

                </div>

                <h1 class="text-2xl font-bold text-white">
                    Verify your email
                </h1>

                <p class="mt-3 text-gray-400 leading-6">
                    Thanks for signing up!
                    Please verify your email address by clicking
                    the link we sent you.
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div
                        class="mt-6 rounded-lg border border-green-500/20
                            bg-green-500/10 px-4 py-3 text-sm text-green-400">
                        A new verification link has been sent to your email.
                    </div>
                @endif

                <form method="POST" action="{{ url('/email/verification-notification') }}" class="mt-7">

                    @csrf

                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600
                           hover:bg-indigo-500 px-4 py-3
                           font-medium text-white transition">
                        Resend verification email
                    </button>

                </form>

                <form method="POST" action="{{ url('/logout') }}" class="mt-4">

                    @csrf

                    <button type="submit"
                        class="text-sm text-gray-500
                           hover:text-gray-300 transition">
                        Log out
                    </button>

                </form>

            </div>

        </div>

    </div>

@endsection
