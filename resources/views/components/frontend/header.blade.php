<section class="bg-text-secondary to-white dark:bg-bg-dark-secondary ">
    <nav class="bg-white dark:bg-bg-dark-primary shadow-md fixed top-0 w-full z-50">
        <div class="max-w-[1650px] mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
            <div class="flex items-center justify-between h-10">
                <div class="md:hidden">
                    <button id="mobile-menu-button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-text-black hover:text-text-primary hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500 dark:text-white">
                        <span class="sr-only">Open main menu</span>
                        <svg id="hamburger-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="close-icon" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-shrink-0 flex justify-end px-2 flex-grow md:flex-grow-0 md:block">
                    <a href="{{ route('f.home') }}" class="flex items-center ">
                        <img src="{{ asset('frontend/images/header-logo.png') }}" alt="Valgrit Logo" class="h-10 md:h-20">
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ route('f.home') }}"
                        class="group relative nav-link px-3 py-2 rounded-md lg:text-2xl xl:text-3xl font-bold transition-colors duration-300 ease-in-out {{ request()->routeIs('f.home') ? 'text-text-primary' : 'text-text-black hover:text-text-primary dark:text-white' }}">
                        Início
                        <span
                            class="absolute bottom-0 left-0 h-0.5 bg-text-primary transition-all duration-300 ease-in-out {{ request()->routeIs('f.home') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>

                    <a href="{{ route('f.shop') }}"
                        class="group relative nav-link px-3 py-2 rounded-md lg:text-2xl xl:text-3xl font-bold transition-colors duration-300 ease-in-out {{ request()->routeIs('f.shop') ? 'text-text-primary' : 'text-text-black hover:text-text-primary dark:text-white' }}">
                        Loja
                        <span
                            class="absolute bottom-0 left-0 h-0.5 bg-text-primary transition-all duration-300 ease-in-out {{ request()->routeIs('f.shop') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                    <a href="{{ route('f.about') }}"
                        class="group relative nav-link px-3 py-2 rounded-md lg:text-2xl xl:text-3xl font-bold transition-colors duration-300 ease-in-out {{ request()->routeIs('f.about') ? 'text-text-primary' : 'text-text-black hover:text-text-primary dark:text-white' }}">
                        Sobre nós
                        <span
                            class="absolute bottom-0 left-0 h-0.5 bg-text-primary transition-all duration-300 ease-in-out {{ request()->routeIs('f.about') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </div>

                <div class="flex items-center space-x-2 sm:space-x-3 md:space-x-8 tablet:mr-16 mr-0">
                    {{-- search --}}
                    <form action="{{ route('f.products.search') }}" method="GET"
                        class="sm:w-18 md:w-full lg:w-full max-w-2xl mx-auto px-1 sm:px-4 md:px-6">
                        <div class="flex items-stretch w-full">
                            <!-- Search Input -->
                            <input type="text" name="search" value="{{ Request::get('search') }}"
                                placeholder="Search Keyword"
                                class="w-full text-sm text-black dark:text-white sm:text-base px-2 sm:px-3 py-1 sm:py-2 rounded-l-md bg-white dark:bg-bg-dark-secondary border dark:border-border-dark-tertiary border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition" />

                            <!-- Search Button -->
                            <button type="submit"
                                class="bg-red-600 text-white px-2 sm:px-4 py-2 sm:py-2 flex items-center justify-center rounded-r-md hover:bg-red-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-2 sm:h-6 sm:w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>


                    <div class="ml-3">
                        <div class="text-gray-900">
                            <button onclick="userModal.showModal()" class="m-1 focus:outline-none">
                                <svg class="h-6 w-6 sm:w-8 sm:h-8 text-gray-700 dark:text-text-dark-tertiary hover:text-blue-500 transition-colors duration-300"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </button>
                        </div>

                        <dialog id="userModal" class="modal">
                            <div class="modal-box p-6 rounded-lg shadow-xl animate-fade-in-down">
                                <h3 class="font-extrabold text-2xl mb-6 text-center text-gray-800 dark:text-white ">Welcome!</h3>

                                @auth
                                <div class="flex justify-center mb-4"> {{-- Added mb-4 for spacing below sign out button --}}
                                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="w-full py-3 rounded-md text-lg font-semibold bg-red-500 text-white border-none
                            hover:bg-red-600 hover:scale-105 hover:shadow-lg hover:shadow-red-500/40
                            transition-all duration-300 transform-gpu flex justify-center items-center dark:text-white">
                                                Sign Out
                                            </button>
                                        </form>
                                    </div>
                                @else
                                <div class="flex flex-col md:flex-row gap-4 mb-4"> {{-- Added mb-4 for spacing below login/register buttons --}}
                                    <a href="{{ route('login') }}"
                                        class="w-full py-3 rounded-md text-lg font-semibold bg-orange-400 text-white border-none
                        hover:bg-orange-700 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/40
                        transition-all duration-300 transform-gpu flex justify-center items-center dark:text-white">
                                            User Login
                                        </a>
                                        <a href="{{ route('register') }}"
                                            class="w-full py-3 rounded-md text-lg font-semibold border-2 border-gray-500 text-gray-700 bg-transparent
                        hover:bg-gray-500 hover:text-white hover:scale-105 hover:shadow-lg hover:shadow-gray-500/40
                        transition-all duration-300 transform-gpu flex justify-center items-center dark:text-white">
                                            Create Account
                                        </a>
                                    </div>
                                @endauth
                                <div class="flex justify-center">
                                    <a href="{{ route('admin.login') }}"
                                        class="w-full py-3 rounded-md text-lg font-semibold bg-rose-500 text-white border-none
                        hover:bg-rose-800 hover:scale-105 hover:shadow-lg hover:shadow-emerald-500/40
                        transition-all duration-300 transform-gpu flex justify-center items-center dark:text-white">
                                        Admin Login
                                    </a>
                                </div>


                                <div class="modal-action mt-8 flex justify-end">
                                    <form method="dialog">
                                        <button
                                            class="py-2 px-4 rounded-md text-gray-600 border border-gray-300 bg-transparent
                        hover:text-gray-500 dark:hover:text-gray-100 transition-colors duration-300 dark:text-white">
                                            Close
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                    </div>
                    <button @click="$store.theme.toggleTheme()"
                    class="p-2 rounded-xl hover:bg-black/10 dark:hover:bg-white/10 transition-colors"
                    data-tooltip="Toggle theme"
                    :title="$store.theme.current.charAt(0).toUpperCase() + $store.theme.current.slice(1) + ' mode'">
                    <i data-lucide="sun" x-show="!$store.theme.darkMode"
                        class="w-5 h-5 text-text-light-primary dark:text-text-white"></i>
                    <i data-lucide="moon" x-show="$store.theme.darkMode"
                        class="w-5 h-5 text-text-light-primary dark:text-text-white"></i>
                </button>

            </div>

        </div>
    </div>

    <div id="mobile-menu" class="md:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('f.home') }}"
                class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('f.home') ? 'text-text-primary bg-gray-50' : 'text-text-black hover:text-text-primary hover:underline duration-300 hover:bg-gray-50' }}">Início</a>

            <a href="{{ route('f.shop') }}"
                class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('f.shop') ? 'text-text-primary bg-gray-50' : 'text-text-black hover:text-text-primary hover:underline duration-300 hover:bg-gray-50' }}">Loja</a>
            <a href="{{ route('f.about') }}"
                class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('f.about') ? 'text-text-primary bg-gray-50' : 'text-text-black hover:text-text-primary hover:underline duration-300 hover:bg-gray-50' }}">Sobre
                nós</a>
        </div>
    </div>
</nav>
</section >
