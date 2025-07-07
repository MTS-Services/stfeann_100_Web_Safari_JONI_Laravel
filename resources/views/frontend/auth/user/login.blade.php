<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-black p-10 rounded-md shadow-sm">
        @csrf
        {{ __('User Login') }}

        <!-- User Icon -->
        <div class="flex justify-center mb-8">
            <div class="w-24 h-24 bg-black text-white rounded-full border-4 border-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-18 w-18 " viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.314 0-10 1.656-10 5v3h20v-3c0-3.344-6.686-5-10-5z" />
                </svg>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label class="text-white " for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 lg:w-full md:w-full w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="text-white" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 lg:w-full md:w-full w-full"
                type="password"
                name="password"
                required autocomplete="current-password" placeholder="Password " />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-sm border-gray-300 text-indigo-600 shadow-xs focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-white hover:text-gray-400 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3 bg-red-600!">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>