<x-guest-layout>
    <form method="POST" action="{{ route('register') }} " class="bg-black py-20 px-10 rounded-sm shadow-lg ">
        @csrf

        <div class="text-white text-2xl font-bold mb-4">
            {{ __('Register') }}
        </div>

        <!-- Name -->
        <div>
            <x-input-label class="text-white" for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="text-white" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 relative">
    <x-input-label class="text-white" for="password" :value="__('Password')"  />

    <!-- Custom Input Field -->
    <input id="password" type="password" placeholder="Password"  name="password" required autocomplete="current-password"
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
  

        <!-- Confirm Password -->
      <div class="mt-4 relative">
    <x-input-label class="text-white" for="password_confirmation" :value="__('Confirm Password')" />

    <!-- Custom Input Field -->
    <input
        id="password_confirmation"
        type="password"
        name="password_confirmation"
        required
        autocomplete="new-password"
        placeholder="Confirm Password"
        class="block mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10 text-sm"
        oninput="handleConfirmPasswordInput()"
    />

    <!-- Eye Icon -->
    <span id="confirmEyeWrapper" class="absolute inset-y-0 right-0 pr-3 flex items-center mt-7 cursor-pointer hidden"
        onclick="toggleConfirmPassword()">
        <svg id="confirmEyeIcon" class="h-5 w-5 text-gray-500 relative" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <!-- Eye shape -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
            <!-- Slash line -->
            <line id="confirmEyeSlash" x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="2"
                class="absolute left-0 top-0" />
        </svg>
    </span>

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-400 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-red-600">
                {{ __('Register') }}
            </x-primary-button>
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
<!-- JavaScript -->
<script>
    const confirmPasswordInput = document.getElementById("password_confirmation");
    const confirmEyeWrapper = document.getElementById("confirmEyeWrapper");
    const confirmEyeSlash = document.getElementById("confirmEyeSlash");
    let confirmVisible = false;

    function handleConfirmPasswordInput() {
        if (confirmPasswordInput.value.length > 0) {
            confirmEyeWrapper.classList.remove("hidden");
        } else {
            confirmEyeWrapper.classList.add("hidden");
        }
    }

    function toggleConfirmPassword() {
        confirmVisible = !confirmVisible;
        if (confirmVisible) {
            confirmPasswordInput.type = "text";
            confirmEyeSlash.style.display = "none";
        } else {
            confirmPasswordInput.type = "password";
            confirmEyeSlash.style.display = "block";
        }
    }

    // Slash line visible initially
    document.addEventListener("DOMContentLoaded", () => {
        confirmEyeSlash.style.display = "block";
    });
</script>
