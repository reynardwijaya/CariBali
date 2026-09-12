<x-auth-split-panel eyebrow="Let's Get You Started" heading="Create an Account">
    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}" id="registerForm" class="space-y-5">
        @csrf

        <div class="relative">
            <label for="name" class="absolute -top-2 left-3 bg-white px-1 text-xs text-gray-500">Your Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:outline-none focus:border-gray-900 transition">
        </div>

        <div class="relative">
            <label for="email" class="absolute -top-2 left-3 bg-white px-1 text-xs text-gray-500">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:outline-none focus:border-gray-900 transition">
        </div>

        <div class="relative">
            <label for="password" class="absolute -top-2 left-3 bg-white px-1 text-xs text-gray-500">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
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

        <input type="hidden" name="password_confirmation" id="password_confirmation">
        <input type="hidden" name="phone" value="">

        <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold tracking-wide uppercase text-sm rounded-lg py-3 transition">
            Get Started
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-8">
        Already have an account?
        <a href="{{ route('login') }}" class="font-semibold text-gray-900 underline">LOGIN HERE</a>
    </p>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('registerForm');
            var password = document.getElementById('password');
            var confirmation = document.getElementById('password_confirmation');
            var toggle = document.getElementById('togglePassword');
            var eyeOpen = document.getElementById('eyeIconOpen');
            var eyeClosed = document.getElementById('eyeIconClosed');

            function syncConfirmation() {
                confirmation.value = password.value;
            }

            password.addEventListener('input', syncConfirmation);
            form.addEventListener('submit', syncConfirmation);

            toggle.addEventListener('click', function () {
                var isPassword = password.type === 'password';
                password.type = isPassword ? 'text' : 'password';
                eyeOpen.classList.toggle('hidden', isPassword);
                eyeClosed.classList.toggle('hidden', !isPassword);
            });
        });
    </script>
</x-auth-split-panel>
