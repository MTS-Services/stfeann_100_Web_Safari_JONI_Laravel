<section class="bg-text-secondary "> <!-- Added pt-20 to prevent content overlap -->

    <nav class="bg-white shadow-md fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <div class="flex items-center">
                    <div class="md:hidden">
                        <button id="mobile-menu-button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-text-black hover:text-text-primary hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500">
                            <span class="sr-only">Open main menu</span>
                            <svg id="hamburger-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg id="close-icon" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-shrink-0 hidden md:block">
                        <a href="{{ route('f.home') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('frontend/images/logo.PNG') }}" alt="Valgrit Logo" class="h-14">
                        </a>
                    </div>
                </div>

                <div class="flex-grow flex justify-center items-center">
                    <div class="">
                        <div class="md:hidden">
                            <a href="{{ route('f.home') }}">
                                <img src="{{ asset('frontend/images/logo.PNG') }}" alt="Valgrit Logo" class="h-10">
                            </a>
                        </div>
                        <div class="hidden md:flex items-baseline space-x-10">
                            <a href="{{ route('f.home') }}"
                                class="group relative nav-link px-3 py-2 rounded-md text-2xl font-bold transition-colors duration-300 ease-in-out {{ request()->routeIs('f.home') ? 'text-text-primary' : 'text-text-black hover:text-text-primary' }}">
                                Início
                                <span
                                    class="absolute bottom-0 left-0 h-0.5 bg-text-primary transition-all duration-300 ease-in-out {{ request()->routeIs('f.home') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                            <a href="{{ route('f.products') }}"
                                class="group relative nav-link px-3 py-2 rounded-md text-2xl font-bold transition-colors duration-300 ease-in-out {{ request()->routeIs('f.products') ? 'text-text-primary' : 'text-text-black hover:text-text-primary' }}">
                                Produtos
                                <span
                                    class="absolute bottom-0 left-0 h-0.5 bg-text-primary transition-all duration-300 ease-in-out {{ request()->routeIs('f.products') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                            <a href="{{ route('f.shop') }}"
                                class="group relative nav-link px-3 py-2 rounded-md text-2xl font-bold transition-colors duration-300 ease-in-out {{ request()->routeIs('f.shop') ? 'text-text-primary' : 'text-text-black hover:text-text-primary' }}">
                                Loja
                                <span
                                    class="absolute bottom-0 left-0 h-0.5 bg-text-primary transition-all duration-300 ease-in-out {{ request()->routeIs('f.shop') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                        </div>
                    </div>
                    <div class="absolute right-50 flex justify-end items-center space-x-6 pr-4">
                        <button class="text-text-black hover:text-text-primary focus:outline-none">
                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <div class="dropdown dropdown-end text-text-black focus:outline-none">
                            <div tabindex="0" role="button" class=" m-1">
                                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content menu bg-base-100 rounded-box z-1 w-40 p-2 shadow-sm">
                                <li><a href="{{ route('admin.login') }}" class="hover:text-text-primary">Login</a></li>
                                <li><a href="{{ route('register') }}" class="hover:text-text-primary">Registration</a>
                                </li>
                            </ul>
                        </div>
                        <button class="text-text-black hover:text-text-primary focus:outline-none">
                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex justify-end items-center space-x-6">
                    {{-- Your icon buttons --}}
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('f.home') }}"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('f.home') ? 'text-text-primary bg-gray-50' : 'text-text-black hover:text-text-primary hover:underline deuration-300 hover:bg-gray-50' }}">Início</a>
                <a href="{{ route('f.products') }}"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('f.products') ? 'text-text-primary bg-gray-50' : 'text-text-black hover:text-text-primary hover:underline deuration-300 hover:bg-gray-50' }}">Produtos</a>
                <a href="{{ route('f.shop') }}"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('f.shop') ? 'text-text-primary bg-gray-50' : 'text-text-black hover:text-text-primary hover:underline deuration-300 hover:bg-gray-50' }}">Loja</a>
            </div>
        </div>
    </nav>



</section>
