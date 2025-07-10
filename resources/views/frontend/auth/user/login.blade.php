<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 " :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-black p-10 rounded-md shadow-sm shadow:gray">
        @csrf
        <div class="text-white text-2xl font-bold mb-4">
        {{ __( 'User Login') }}
        </div>

        <!-- User Icon -->
        <div class="flex justify-center mb-8">
            <div class="w-24 h-24 bg-black text-white rounded-full border-4 border-white flex items-center justify-center">
                <a href="{{ route('f.home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-18 w-18 " viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.314 0-10 1.656-10 5v3h20v-3c0-3.344-6.686-5-10-5z" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label class="text-white" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 lg:w-full md:w-full w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
    <div class="mt-4 relative">
    <x-input-label class="text-white" for="password" :value="__('Password')" />

    <!-- Custom Input Field -->
    <input id="password" type="password" name="password" required autocomplete="current-password"
        class="block mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10 text-sm"
        oninput="handlePasswordInput()" />

    <!-- Eye Icon -->
    <span id="eyeWrapper"
        class="absolute inset-y-0 right-0 pr-3 flex items-center mt-7 cursor-pointer hidden"
        onclick="togglePassword()">
        <svg id="eyeIcon" class="h-5 w-5 text-gray-500 relative" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <!-- Eye shape -->
            <path id="eyeIconPath1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path id="eyeIconPath2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
            <!-- Slash line -->
            <line id="eyeSlash" x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="2"
                class="absolute left-0 top-0" />
        </svg>
    </span>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>
        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-sm border-gray-300 text-indigo-600 shadow-xs focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login & Forgot Password -->
        <div class="flex items-center justify-between mt-4">
            
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-red-400 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 duration-300 transition-all ease-in-out" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-red-600!">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
          <!-- Create Account -->
    <div class="text-center mt-6">
        <p class="text-white text-sm">
            {{ __("Don't have an account?") }}
            <a href="{{ route('register') }}" class="underline text-sm text-white hover:text-red-400 duration-300 transition-all ease-in-out">
                {{ __('Create Account') }}
            </a>
        </p>
    </div>
    </form>


</x-guest-layout>
<script>
    const passwordInput = document.getElementById("password");
    const eyeWrapper = document.getElementById("eyeWrapper");
    const eyeSlash = document.getElementById("eyeSlash");
    let passwordVisible = false;

    function handlePasswordInput() {
        // Show icon only when input has value
        if (passwordInput.value.length > 0) {
            eyeWrapper.classList.remove("hidden");
        } else {
            eyeWrapper.classList.add("hidden");
        }
    }

    function togglePassword() {
        passwordVisible = !passwordVisible;
        if (passwordVisible) {
            passwordInput.type = "text";
            eyeSlash.style.display = "none"; // Hide slash
        } else {
            passwordInput.type = "password";
            eyeSlash.style.display = "block"; // Show slash
        }
    }

    // Initial setup: hide slash if type is password
    document.addEventListener("DOMContentLoaded", () => {
        eyeSlash.style.display = "block";
    });
</script>