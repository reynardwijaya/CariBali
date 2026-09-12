<x-auth-split-panel eyebrow="Welcome Back" heading="Log In to Your Account">
    <x-validation-errors class="mb-4" />

    @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
    @endsession

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div class="relative">
            <label for="email" class="absolute -top-2 left-3 bg-white px-1 text-xs text-gray-500">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:outline-none focus:border-gray-900 transition">
        </div>

        <div class="relative">
            <label for="password" class="absolute -top-2 left-3 bg-white px-1 text-xs text-gray-500">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 pr-11 text-gray-900 focus:outline-none focus:border-gray-900 transition">
            <button type="button" id="togglePassword" aria-label="Show password"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                <svg id="eyeIconOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <svg id="eyeIconClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
            </button>
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center gap-2 text-sm text-gray-600">
                <input id="remember_me" type="checkbox" name="remember"
                       class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 underline">
                    Forgot your password?
                </a>
            @endif
        </div>

        <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold tracking-wide uppercase text-sm rounded-lg py-3 transition">
            Log In
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-8">
        Don't have an account?
        <a href="{{ route('register') }}" class="font-semibold text-gray-900 underline">SIGN UP HERE</a>
    </p>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var password = document.getElementById('password');
            var toggle = document.getElementById('togglePassword');
            var eyeOpen = document.getElementById('eyeIconOpen');
            var eyeClosed = document.getElementById('eyeIconClosed');

            toggle.addEventListener('click', function () {
                var isPassword = password.type === 'password';
                password.type = isPassword ? 'text' : 'password';
                eyeOpen.classList.toggle('hidden', isPassword);
                eyeClosed.classList.toggle('hidden', !isPassword);
            });
        });
    </script>
</x-auth-split-panel>
