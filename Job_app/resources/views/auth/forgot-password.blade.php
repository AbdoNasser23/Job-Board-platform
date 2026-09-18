<x-guest-layout heading="Forgot your password?" subheading="No worries — we'll send a reset link straight to your inbox.">

    <h2 class="font-display text-2xl font-semibold mb-1">Reset your password</h2>
    <p class="text-sm text-[#8E8EA0] mb-8">
        Enter the email linked to your account and we'll send you a link to set a new one.
    </p>

    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="Email address" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <x-primary-button>Email password reset link</x-primary-button>

        <p class="text-sm text-[#8E8EA0] text-center">
            Remembered it after all?
            <a href="{{ route('login') }}" class="text-[#5B8DEF] hover:text-[#7BA3F2]">Back to sign in</a>
        </p>
    </form>
</x-guest-layout>
