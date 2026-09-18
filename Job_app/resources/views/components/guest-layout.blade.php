@props(['heading' => 'Find work that fits your life.', 'subheading' => 'Track applications, get instant feedback, and land the role that fits.'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jobly') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-display { font-family: 'Sora', sans-serif; }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-[#0A0A0F] text-[#F2F2F5]">
    <div class="min-h-screen flex">

        {{-- Left branding panel --}}
        <div class="hidden lg:flex lg:w-[46%] relative flex-col justify-between p-12 overflow-hidden bg-gradient-to-b from-[#0F0F17] to-[#0A0A0F] border-r border-[#1F1F29]">
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 600 800" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                <path d="M-40 620 C 120 560, 180 420, 340 400 S 560 260, 660 160" stroke="#5B8DEF" stroke-width="1.5" stroke-opacity="0.35"/>
                <path d="M-60 700 C 100 660, 200 540, 320 520 S 540 360, 640 260" stroke="#5B8DEF" stroke-width="1" stroke-opacity="0.18"/>
                <circle cx="340" cy="400" r="4" fill="#5B8DEF"/>
                <circle cx="560" cy="260" r="3" fill="#5B8DEF" fill-opacity="0.6"/>
            </svg>

            <a href="/" class="relative flex items-center gap-2 font-display font-semibold text-lg tracking-tight">
                <span class="flex h-8 w-8 items-center justify-center rounded-md bg-[#5B8DEF] text-[#0A0A0F] text-sm">J</span>
                Jobly
            </a>

            <div class="relative">
                <h1 class="font-display text-4xl leading-tight font-semibold max-w-sm">
                    {{ $heading }}
                </h1>
                <p class="mt-4 text-[#8E8EA0] max-w-xs">
                    {{ $subheading }}
                </p>
            </div>

            <p class="relative text-xs text-[#54546A]">© {{ date('Y') }} Jobly. All rights reserved.</p>
        </div>

        {{-- Right form panel --}}
        <div class="flex flex-1 items-center justify-center p-6 sm:p-10">
            <div class="w-full max-w-sm">
                <a href="/" class="lg:hidden mb-8 flex items-center gap-2 font-display font-semibold text-lg">
                    <span class="flex h-8 w-8 items-center justify-center rounded-md bg-[#5B8DEF] text-[#0A0A0F] text-sm">J</span>
                    Jobly
                </a>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
