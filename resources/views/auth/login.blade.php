<x-guest-layout>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .title {
            font-size: 4rem;
            margin-bottom: 20px;
            background-color: #ffa500; /* Orange background */
            padding: 10px;
            border-radius: 10px;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 400px;
            margin: 0 auto;
        }
        .form-container input {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            font-size: 1.2rem;
        }
        .form-container .mt-4 {
            margin-top: 20px;
        }
        .login-button {
            background-color: #ffa500; /* Orange color for button */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
        }
        .login-button:hover {
            background-color: #ff8c00; /* Darker orange on hover */
        }
    </style>

<div class="title">FOODABLES</div>

<div class="form-container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="login-button ml-3">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Basic email validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        // Basic password validation (for example, minimum length)
        if (password.length < 6) {
            alert('Password must be at least 6 characters long.');
            return false;
        }

        return true; // Allow form submission
    }
</script>
</x-guest-layout>

