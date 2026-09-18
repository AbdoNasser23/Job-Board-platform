<x-guest-layout heading="Almost there." subheading="Verify your email so you never miss an update on your applications.">

    <h2 class="font-display text-2xl font-semibold mb-1">Verify your email</h2>
    <p class="text-sm text-[#8E8EA0] mb-8">
        Thanks for signing up! Before you get started, click the link we emailed you to verify your
        address. Didn't get it? We can send another one.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 rounded-lg border border-emerald-800/40 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-400">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <div class="space-y-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>Resend verification email</x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-center text-sm text-[#8E8EA0] hover:text-[#C7C7D1] transition-colors">
                Log out
            </button>
        </form>
    </div>
</x-guest-layout>
