<x-guest-layout heading="Just checking it's you." subheading="This is a secure area — confirm your password to keep going.">

    <h2 class="font-display text-2xl font-semibold mb-1">Confirm your password</h2>
    <p class="text-sm text-[#8E8EA0] mb-8">
        This is a secure area of Jobly. Please confirm your password before continuing.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                autofocus placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <x-primary-button>Confirm</x-primary-button>
    </form>
</x-guest-layout>
