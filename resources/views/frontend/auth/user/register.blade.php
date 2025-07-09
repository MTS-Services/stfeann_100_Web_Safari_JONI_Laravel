<x-guest-layout>
    <form method="POST" action="{{ route('register') }} " class="bg-black py-20 px-10 rounded-sm ">
        @csrf

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
    <x-input-label class="text-white" for="password" :value="__('Password')" />

    <!-- Custom Input Field -->
    <input id="password" type="password" name="password" required autocomplete="current-password" class="block mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10 text-sm" />

    <!-- Eye Icon -->
    <span class="absolute inset-y-0 right-0 pr-3 flex items-center mt-7 cursor-pointer" onclick="togglePassword()">
        <svg id="eyeIcon" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path id="eyeIconPath1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path id="eyeIconPath2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
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
    />

    <!-- Eye Icon -->
    <span class="absolute inset-y-0 right-0 pr-3 flex items-center mt-7 cursor-pointer" onclick="toggleConfirmPassword()">
        <svg id="confirmEyeIcon" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path id="confirmEyeIconPath1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path id="confirmEyeIconPath2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
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
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            // Optional: Change icon if you want (you can replace SVG)
        } else {
            passwordInput.type = "password";
        }
    }
</script>
<!-- JavaScript -->
<script>
    function toggleConfirmPassword() {
        const confirmInput = document.getElementById("password_confirmation");
        if (confirmInput.type === "password") {
            confirmInput.type = "text";
        } else {
            confirmInput.type = "password";
        }
    }
</script>