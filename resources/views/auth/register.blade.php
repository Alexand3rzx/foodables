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
        .register-button {
            background-color: #ffa500; /* Orange color for button */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
        }
        .register-button:hover {
            background-color: #ff8c00; /* Darker orange on hover */
        }
    </style>

    <div class="title">FOODABLES</div>

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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="register-button ml-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
