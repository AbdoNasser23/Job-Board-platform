<x-guest-layout heading="Start your next chapter." subheading="Create an account to browse roles and apply in minutes.">

    <h2 class="font-display text-2xl font-semibold mb-1">Create your account</h2>
    <p class="text-sm text-[#8E8EA0] mb-8">
        Already have an account?
        <a href="{{ route('login') }}" class="text-[#5B8DEF] hover:text-[#7BA3F2]">Sign in</a>
    </p>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" value="Full name" />
            <x-text-input id="name" name="name" :value="old('name')" required autofocus autocomplete="name"
                placeholder="Jane Doe" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Email address" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required
                autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Confirm password" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <p class="text-xs text-[#5C5C6E]">By creating an account you're signing up as a job seeker.</p>

        <x-primary-button>Create account</x-primary-button>
    </form>
</x-guest-layout>
