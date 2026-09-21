@extends('layouts.app')

@section('title', 'Find Your Next Job - JobBoard')

@section('content')

    <!-- Hero -->
    <section class="relative overflow-hidden">

        <!-- Background decoration -->
        <div class="absolute inset-0 pointer-events-none">
            <div
                class="absolute -top-40 left-1/2 -translate-x-1/2
                    w-[700px] h-[400px]
                    bg-indigo-600/10 blur-3xl rounded-full">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 pt-20 pb-16">

            <div class="max-w-3xl mx-auto text-center">

                <div
                    class="inline-flex items-center gap-2
                        rounded-full border border-indigo-500/20
                        bg-indigo-500/10 px-4 py-2
                        text-sm text-indigo-300 mb-6">

                    <span class="w-2 h-2 rounded-full bg-indigo-400"></span>

                    Find your next opportunity

                </div>

                <h1 class="text-5xl md:text-6xl font-bold
                       tracking-tight text-white leading-tight">

                    Find a job you
                    <span class="text-indigo-500">
                        actually want.
                    </span>

                </h1>

                <p class="mt-6 text-lg text-gray-400 leading-8 max-w-2xl mx-auto">

                    Discover opportunities from companies looking for
                    talented people like you. Search, apply, and grow
                    your career with JobBoard.

                </p>

            </div>


            <!-- Search Box -->
            <div class="max-w-4xl mx-auto mt-10">

                <form action="#" method="GET"
                    class="bg-dark-800 border border-white/10
                         rounded-2xl p-3 shadow-2xl">

                    <div class="grid md:grid-cols-[1fr_1fr_auto] gap-3">

                        <!-- Job -->
                        <div class="flex items-center gap-3
                                bg-dark-700 rounded-xl px-4">

                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                            </svg>

                            <input type="text" name="search" placeholder="Job title, keywords..."
                                class="w-full bg-transparent border-0
                                   py-3 text-white placeholder-gray-500
                                   focus:ring-0 outline-none">

                        </div>


                        <!-- Location -->
                        <div class="flex items-center gap-3
                                bg-dark-700 rounded-xl px-4">

                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                            </svg>

                            <input type="text" name="location" placeholder="Location"
                                class="w-full bg-transparent border-0
                                   py-3 text-white placeholder-gray-500
                                   focus:ring-0 outline-none">

                        </div>


                        <button type="submit"
                            class="rounded-xl bg-indigo-600
                               hover:bg-indigo-500
                               px-7 py-3 font-medium text-white
                               transition">
                            Search Jobs
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>


    <!-- Categories -->
    <section class="border-y border-white/10 bg-dark-800/50">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex items-center justify-between mb-6">

                <div>
                    <h2 class="text-xl font-semibold text-white">
                        Explore categories
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Find opportunities that match your skills.
                    </p>
                </div>

                <a href="#"
                    class="hidden sm:block text-sm text-indigo-400
                      hover:text-indigo-300">
                    View all →
                </a>

            </div>


            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                @foreach ([['Backend Development', '128 jobs'], ['Frontend Development', '96 jobs'], ['UI / UX Design', '74 jobs'], ['Data & AI', '61 jobs']] as $category)
                    <a href="#"
                        class="group rounded-xl border border-white/10
                          bg-dark-800 p-5
                          hover:border-indigo-500/40
                          hover:bg-indigo-500/5
                          transition">

                        <h3 class="font-medium text-gray-200
                               group-hover:text-white">
                            {{ $category[0] }}
                        </h3>

                        <p class="mt-2 text-sm text-gray-500">
                            {{ $category[1] }}
                        </p>

                    </a>
                @endforeach

            </div>

        </div>

    </section>


    <!-- Featured Jobs -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h2 class="text-2xl font-bold text-white">
                    Featured jobs
                </h2>

                <p class="mt-2 text-gray-500">
                    Opportunities worth checking out.
                </p>
            </div>

            <a href="#" class="text-sm text-indigo-400 hover:text-indigo-300">
                View all jobs →
            </a>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

            @foreach ([
            [
                'title' => 'Senior Backend Developer',
                'company' => 'TechFlow',
                'location' => 'Remote',
                'type' => 'Full-time',
                'salary' => '$2,500 - $3,500',
            ],
            [
                'title' => 'Laravel Backend Developer',
                'company' => 'CodeLabs',
                'location' => 'Cairo, Egypt',
                'type' => 'Full-time',
                'salary' => '$1,500 - $2,200',
            ],
            [
                'title' => 'Junior PHP Developer',
                'company' => 'DevCore',
                'location' => 'Hybrid',
                'type' => 'Full-time',
                'salary' => '$900 - $1,400',
            ],
        ] as $job)
                <div
                    class="group rounded-2xl border border-white/10
                        bg-dark-800 p-6
                        hover:border-indigo-500/30
                        hover:-translate-y-1
                        transition duration-200">

                    <div class="flex items-start justify-between">

                        <div
                            class="w-11 h-11 rounded-xl
                                bg-indigo-500/10
                                border border-indigo-500/20
                                flex items-center justify-center">

                            <span class="text-indigo-400 font-bold">
                                {{ substr($job['company'], 0, 1) }}
                            </span>

                        </div>

                        <button class="text-gray-600 hover:text-gray-300">
                            ♡
                        </button>

                    </div>


                    <h3 class="mt-5 text-lg font-semibold text-white">
                        {{ $job['title'] }}
                    </h3>

                    <p class="mt-1 text-sm text-indigo-400">
                        {{ $job['company'] }}
                    </p>


                    <div class="mt-5 space-y-3 text-sm text-gray-500">

                        <div class="flex items-center gap-2">
                            <span>📍</span>
                            {{ $job['location'] }}
                        </div>

                        <div class="flex items-center gap-2">
                            <span>💼</span>
                            {{ $job['type'] }}
                        </div>

                        <div class="flex items-center gap-2">
                            <span>💰</span>
                            {{ $job['salary'] }}
                        </div>

                    </div>


                    <a href="#"
                        class="block mt-6 w-full text-center
                          rounded-lg border border-white/10
                          py-2.5 text-sm font-medium
                          text-gray-300
                          hover:bg-indigo-600
                          hover:border-indigo-600
                          hover:text-white
                          transition">

                        View job

                    </a>

                </div>
            @endforeach

        </div>

    </section>


    <!-- CTA -->
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <div
            class="relative overflow-hidden rounded-2xl
                border border-indigo-500/20
                bg-indigo-500/5 p-10 md:p-14 text-center">

            <div class="relative">

                <h2 class="text-3xl font-bold text-white">
                    Ready for your next opportunity?
                </h2>

                <p class="mt-3 text-gray-400">
                    Create your account and start exploring jobs today.
                </p>

                <div class="mt-7 flex flex-col sm:flex-row
                        justify-center gap-3">

                    <a href="{{ url('/register') }}"
                        class="rounded-lg bg-indigo-600
                          hover:bg-indigo-500
                          px-6 py-3 font-medium text-white
                          transition">
                        Create an account
                    </a>

                    <a href="{{ url('/login') }}"
                        class="rounded-lg border border-white/10
                          hover:bg-white/5
                          px-6 py-3 font-medium text-gray-300
                          transition">
                        Login
                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection
