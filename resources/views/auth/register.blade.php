<x-guest-layout>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .center-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 400px;
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .logo {
            margin-bottom: 20px;
            width: 100px; /* Adjust size as needed */
            height: auto;
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

        .register-button {
            background-color: #ffa500; /* Orange color for button */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            width: 100%;
        }

        .register-button:hover {
            background-color: #ff8c00; /* Darker orange on hover */
        }

        .link-container {
            margin-top: 20px;
            text-align: center;
        }

        .link-container a {
            color: #007bff;
            text-decoration: none;
        }

        .link-container a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="center-container">
        <!-- Logo -->
        <img src="{{ asset('logos/welcome.jpg') }}" alt="FOODABLES Logo" class="logo">

        <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <button type="submit" class="register-button">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>

            <div class="link-container mt-4">
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
