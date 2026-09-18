
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password - Job Board</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

    <div class="flex min-h-screen items-center justify-center px-4 py-12">

        <div class="w-full max-w-md">

            <div class="mb-8 text-center">

                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Job<span class="text-blue-600">Board</span>
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Create a new password
                </p>

            </div>


            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <div class="mb-6">

                    <h2 class="text-xl font-semibold text-slate-900">
                        Reset your password
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Choose a new password for your account.
                    </p>

                </div>


                <form method="POST"
                      action="{{ route('password.store') }}"
                      class="space-y-5">

                    @csrf

                    <input
                        type="hidden"
                        name="token"
                        value="{{ $request->route('token') }}"
                    >


                    <div>

                        <label for="email"
                               class="mb-2 block text-sm font-medium text-slate-700">
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            autocomplete="username"
                            placeholder="you@example.com"
                            class="w-full rounded-lg border
                            {{ $errors->has('email') ? 'border-red-400 ring-2 ring-red-100' : 'border-slate-300' }}
                            bg-white px-3.5 py-2.5 text-sm outline-none
                            transition placeholder:text-slate-400
                            focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <div>

                        <label for="password"
                               class="mb-2 block text-sm font-medium text-slate-700">
                            New password
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full rounded-lg border
                            {{ $errors->has('password') ? 'border-red-400 ring-2 ring-red-100' : 'border-slate-300' }}
                            bg-white px-3.5 py-2.5 text-sm outline-none
                            transition placeholder:text-slate-400
                            focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >

                        @error('password')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <div>

                        <label for="password_confirmation"
                               class="mb-2 block text-sm font-medium text-slate-700">
                            Confirm new password
                        </label>

                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 text-sm outline-none
                            transition placeholder:text-slate-400
                            focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >

                    </div>


                    <button
                        type="submit"
                        class="w-full rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white
                        shadow-sm transition hover:bg-blue-700
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">

                        Reset password

                    </button>

                </form>


                <div class="mt-6 text-center">

                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-blue-600 hover:text-blue-700">
                        ← Back to login
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>
</html>

