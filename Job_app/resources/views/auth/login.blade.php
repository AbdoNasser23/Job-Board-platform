<x-guest-layout heading="Welcome back." subheading="Sign in to keep track of your applications and discover new roles.">

    <h2 class="font-display text-2xl font-semibold mb-1">Sign in</h2>
    <p class="text-sm text-[#8E8EA0] mb-8">
        New to Jobly?
        <a href="{{ route('register') }}" class="text-[#5B8DEF] hover:text-[#7BA3F2]">Create an account</a>
    </p>

    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="Email address" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2">
                <x-checkbox name="remember" />
                <span class="text-sm text-[#8E8EA0]">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-[#5B8DEF] hover:text-[#7BA3F2]" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <x-primary-button>Sign in</x-primary-button>
    </form>
</x-guest-layout>
