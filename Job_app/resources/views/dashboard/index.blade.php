@extends('layouts.app')

@section('title', 'Dashboard - JobBoard')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="flex flex-col md:flex-row
                md:items-center md:justify-between gap-4 mb-10">

            <div>

                <p class="text-sm text-indigo-400 mb-2">
                    Dashboard
                </p>

                <h1 class="text-3xl font-bold text-white">
                    Welcome back 👋
                </h1>

                <p class="mt-2 text-gray-500">
                    Here's what's happening with your job search.
                </p>

            </div>

            <a href="#"
                class="inline-flex items-center justify-center
                  rounded-lg bg-indigo-600 hover:bg-indigo-500
                  px-5 py-3 text-sm font-medium text-white
                  transition">
                Browse Jobs
            </a>

        </div>


        <!-- Stats -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">

            @foreach ([['label' => 'Applications', 'value' => '12', 'change' => '+3 this week'], ['label' => 'Saved Jobs', 'value' => '8', 'change' => '+2 this week'], ['label' => 'Interviews', 'value' => '4', 'change' => '2 upcoming'], ['label' => 'Profile Views', 'value' => '47', 'change' => '+18% this week']] as $stat)
                <div class="rounded-2xl border border-white/10
                        bg-dark-800 p-6">

                    <p class="text-sm text-gray-500">
                        {{ $stat['label'] }}
                    </p>

                    <div class="flex items-end justify-between mt-3">

                        <span class="text-3xl font-bold text-white">
                            {{ $stat['value'] }}
                        </span>

                        <span class="text-xs text-green-400">
                            {{ $stat['change'] }}
                        </span>

                    </div>

                </div>
            @endforeach

        </div>


        <div class="grid lg:grid-cols-3 gap-6">


            <!-- Applications -->
            <div class="lg:col-span-2 rounded-2xl
                    border border-white/10 bg-dark-800">

                <div class="flex items-center justify-between
                        px-6 py-5 border-b border-white/10">

                    <div>
                        <h2 class="font-semibold text-white">
                            Recent applications
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Track your latest applications.
                        </p>
                    </div>

                    <a href="#" class="text-sm text-indigo-400
                          hover:text-indigo-300">
                        View all
                    </a>

                </div>


                <div class="divide-y divide-white/10">

                    @foreach ([
            [
                'job' => 'Laravel Backend Developer',
                'company' => 'CodeLabs',
                'date' => 'Sep 18, 2026',
                'status' => 'Under review',
            ],
            [
                'job' => 'PHP Developer',
                'company' => 'TechFlow',
                'date' => 'Sep 16, 2026',
                'status' => 'Interview',
            ],
            [
                'job' => 'Backend Engineer',
                'company' => 'DevCore',
                'date' => 'Sep 13, 2026',
                'status' => 'Applied',
            ],
        ] as $application)
                        <div
                            class="px-6 py-5
                                flex flex-col sm:flex-row
                                sm:items-center
                                sm:justify-between gap-4">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-10 h-10 rounded-lg
                                        bg-indigo-500/10
                                        flex items-center justify-center">

                                    <span class="text-indigo-400 font-semibold">
                                        {{ substr($application['company'], 0, 1) }}
                                    </span>

                                </div>

                                <div>

                                    <h3 class="text-sm font-medium text-white">
                                        {{ $application['job'] }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ $application['company'] }}
                                        ·
                                        {{ $application['date'] }}
                                    </p>

                                </div>

                            </div>


                            @php
                                $statusClasses = match ($application['status']) {
                                    'Interview' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                                    'Under review' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20',
                                    default => 'bg-gray-500/10 text-gray-400 border-gray-500/20',
                                };
                            @endphp

                            <span
                                class="inline-flex w-fit
                                     rounded-full border
                                     px-3 py-1 text-xs
                                     {{ $statusClasses }}">

                                {{ $application['status'] }}

                            </span>

                        </div>
                    @endforeach

                </div>

            </div>


            <!-- Profile -->
            <div class="rounded-2xl border border-white/10
                    bg-dark-800 p-6">

                <div class="flex items-center gap-4">

                    <div
                        class="w-14 h-14 rounded-full
                            bg-indigo-600
                            flex items-center justify-center
                            text-xl font-bold text-white">

                        JD

                    </div>

                    <div>

                        <h2 class="font-semibold text-white">
                            John Doe
                        </h2>

                        <p class="text-sm text-gray-500">
                            Backend Developer
                        </p>

                    </div>

                </div>


                <!-- Profile completion -->
                <div class="mt-7">

                    <div class="flex justify-between
                            text-sm mb-2">

                        <span class="text-gray-400">
                            Profile completion
                        </span>

                        <span class="text-indigo-400">
                            75%
                        </span>

                    </div>

                    <div class="h-2 rounded-full bg-dark-700 overflow-hidden">

                        <div class="h-full w-3/4
                                bg-indigo-600 rounded-full">
                        </div>

                    </div>

                </div>


                <div class="mt-7 space-y-3">

                    <a href="#"
                        class="flex items-center justify-between
                          rounded-lg border border-white/10
                          px-4 py-3 text-sm text-gray-300
                          hover:bg-white/5 transition">

                        Edit profile

                        <span>→</span>

                    </a>

                    <a href="#"
                        class="flex items-center justify-between
                          rounded-lg border border-white/10
                          px-4 py-3 text-sm text-gray-300
                          hover:bg-white/5 transition">

                        Saved jobs

                        <span>→</span>

                    </a>

                </div>

            </div>

        </div>


        <!-- Recommended Jobs -->
        <div class="mt-8">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h2 class="text-xl font-semibold text-white">
                        Recommended jobs
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Based on your profile and interests.
                    </p>

                </div>

                <a href="#" class="text-sm text-indigo-400
                      hover:text-indigo-300">
                    View all
                </a>

            </div>


            <div class="grid md:grid-cols-3 gap-5">

                @foreach ([['title' => 'Backend Laravel Developer', 'company' => 'NexaTech', 'location' => 'Remote'], ['title' => 'PHP Backend Engineer', 'company' => 'SoftLabs', 'location' => 'Cairo'], ['title' => 'API Developer', 'company' => 'CloudCore', 'location' => 'Hybrid']] as $job)
                    <div
                        class="rounded-2xl border border-white/10
                            bg-dark-800 p-5
                            hover:border-indigo-500/30
                            transition">

                        <div
                            class="w-10 h-10 rounded-lg
                                bg-indigo-500/10
                                flex items-center justify-center">

                            <span class="text-indigo-400 font-semibold">
                                {{ substr($job['company'], 0, 1) }}
                            </span>

                        </div>

                        <h3 class="mt-5 font-semibold text-white">
                            {{ $job['title'] }}
                        </h3>

                        <p class="mt-1 text-sm text-indigo-400">
                            {{ $job['company'] }}
                        </p>

                        <p class="mt-3 text-sm text-gray-500">
                            📍 {{ $job['location'] }}
                        </p>

                        <a href="#"
                            class="block mt-5 text-center
                              rounded-lg bg-white/5
                              hover:bg-indigo-600
                              py-2.5 text-sm
                              text-gray-300 hover:text-white
                              transition">

                            View job

                        </a>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

@endsection
