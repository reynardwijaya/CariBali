<x-auth-split-panel eyebrow="Account Recovery" heading="Reset Your Password">
    <p class="text-sm text-gray-500 mb-6 leading-relaxed">
        Forgot your password? No problem. Just let us know your email address and we will email you a
        password reset link that will allow you to choose a new one.
    </p>

    @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
    @endsession

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div class="relative">
            <label for="email" class="absolute -top-2 left-3 bg-white px-1 text-xs text-gray-500">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:outline-none focus:border-gray-900 transition">
        </div>

        <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold tracking-wide uppercase text-sm rounded-lg py-3 transition">
            Email Password Reset Link
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-8">
        Remember your password?
        <a href="{{ route('login') }}" class="font-semibold text-gray-900 underline">LOGIN HERE</a>
    </p>
</x-auth-split-panel>
