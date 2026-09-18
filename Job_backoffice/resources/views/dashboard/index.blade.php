@extends('layouts.backoffice')

@section('title', 'Dashboard - Job Board')

@section('page-title', 'Dashboard')

@section('content')

    <div class="mb-8">

        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            Welcome back, {{ auth()->user()->name ?? 'Admin' }}
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Here's what's happening with your job board today.
        </p>

    </div>


    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <p class="text-sm font-medium text-slate-500">
                Active Users
            </p>

            <p class="mt-2 text-2xl font-bold text-slate-900">
                1,248
            </p>

            <p class="mt-4 text-xs text-slate-400">
                Last 30 days
            </p>

        </div>


        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <p class="text-sm font-medium text-slate-500">
                Active Jobs
            </p>

            <p class="mt-2 text-2xl font-bold text-slate-900">
                186
            </p>

            <p class="mt-4 text-xs text-slate-400">
                Currently published
            </p>

        </div>


        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <p class="text-sm font-medium text-slate-500">
                Applications
            </p>

            <p class="mt-2 text-2xl font-bold text-slate-900">
                3,421
            </p>

            <p class="mt-4 text-xs text-slate-400">
                Total received
            </p>

        </div>


        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <p class="text-sm font-medium text-slate-500">
                Companies
            </p>

            <p class="mt-2 text-2xl font-bold text-slate-900">
                74
            </p>

            <p class="mt-4 text-xs text-slate-400">
                Active companies
            </p>

        </div>

    </div>


    <div class="mt-6 grid gap-6 xl:grid-cols-3">

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">

            <h3 class="font-semibold text-slate-900">
                Applications Overview
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Application activity over the last 30 days.
            </p>

            <div class="mt-6 flex h-64 items-center justify-center rounded-lg border border-dashed border-slate-200 bg-slate-50">

                <div class="text-center">

                    <p class="text-sm font-medium text-slate-500">
                        Chart will appear here
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Analytics integration coming later
                    </p>

                </div>

            </div>

        </div>


        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

            <h3 class="font-semibold text-slate-900">
                Most Applied Jobs
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Popular vacancies
            </p>

            <div class="mt-5 space-y-4">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-800">
                            Backend Laravel Developer
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Tech Company
                        </p>
                    </div>

                    <span class="text-sm font-semibold text-slate-700">
                        124
                    </span>
                </div>


                <div class="border-t border-slate-100"></div>


                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-800">
                            Flutter Developer
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Digital Agency
                        </p>
                    </div>

                    <span class="text-sm font-semibold text-slate-700">
                        98
                    </span>
                </div>


                <div class="border-t border-slate-100"></div>


                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-800">
                            UI/UX Designer
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Creative Studio
                        </p>
                    </div>

                    <span class="text-sm font-semibold text-slate-700">
                        76
                    </span>
                </div>

            </div>

        </div>

    </div>

@endsection
