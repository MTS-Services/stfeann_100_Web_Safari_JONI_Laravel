<div class="relative max-w-[1500px] mx-auto px-4">
    <!-- Swiper Slider -->
    <div class="swiper mySwiper w-full h-full">
        <div class="swiper-wrapper">

            @foreach (App\Models\Category::all() as $category)
                <!-- Slide 1 -->
                
                <div
                    class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
                    <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
                    <img src="{{ asset('assets/frontend/imagens/f1.png') }}" alt="24/7 Support" class="w-full h-full">
                    <div class="flex items-center justify-center mt-1">
                        <p
                            class="text-gray-900 inline-block px-6 mx-auto w-auto rounded-xl text-sm md:text-base bg-emerald-100">
                            {{ $category->name }}</p>
                    </div>
                </div>
                
            @endforeach
         

            {{-- <!-- Slide 2 -->
            <div
                class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
                <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
                <img src="{{ asset('assets/frontend/imagens/f2.png') }}" alt="Ethereum" class="w-full h-full">
                <div class="flex items-center justify-center mt-1">
                    <p
                        class="text-gray-900 text-sm md:text-base inline-block px-6 mx-auto w-auto rounded-xl bg-fuchsia-100">
                        Pedidos Online</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div
                class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
                <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
                <img src="{{ asset('assets/frontend/imagens/f3.png') }}" alt="Solana" class="w-full h-full">
                <div class="flex items-center justify-center mt-1">
                    <p
                        class="text-gray-900 text-sm md:text-base inline-block px-6 mx-auto w-auto rounded-xl bg-amber-100">
                        Salva Dinheiro</p>
                </div>
            </div>

            <!-- Slide 4 -->
            <div
                class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
                <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
                <img src="{{ asset('assets/frontend/imagens/f4.png') }}" alt="Dogecoin" class="w-full h-full">
                <div class="flex items-center justify-center mt-1">
                    <p
                        class="text-gray-900 inline-block px-6 mx-auto w-auto rounded-xl text-sm md:text-base bg-blue-100">
                        Promoções</p>
                </div>
            </div>

            <!-- Slide 5 -->
            <div
                class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
                <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
                <img src="{{ asset('assets/frontend/imagens/f5.png') }}" alt="Bitcoin" class="w-full h-full">
                <div class="flex items-center justify-center mt-1">
                    <p
                        class="text-gray-900 inline-block px-6 mx-auto w-auto rounded-xl text-sm md:text-base bg-purple-100">
                        Ofertas</p>
                </div>
            </div>

            <!-- Slide 6 -->
            <div
                class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
                <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
                <img src="{{ asset('assets/frontend/imagens/f6.png') }}" alt="Bitcoin" class="w-full h-full">
                <div class="flex items-center justify-center mt-1">
                    <p
                        class="text-gray-900 inline-block px-6 mx-auto w-auto rounded-xl text-sm md:text-base bg-rose-50">
                        Suporte</p>
                </div>
            </div> --}}
        </div>

        <!-- Pagination (optional) -->
        <div class="swiper-pagination mt-4"></div>
    </div>


    <!-- Prev Arrow -->

    <!-- Pagination -->
    <div class="swiper-pagination !-bottom-6 sm:!-bottom-7 md:!-bottom-8"></div>

    <!-- Navigation buttons -->
    <!-- Show navigation on all screens, but position differently for mobile -->
    <div
        class="swiper-button swiper-button-prev absolute top-1/2 -translate-y-1/2 -left-9 sm:-left-8! md:-left-10! lg:-left-16xl:-left-24 2xl:-left-28 3xl:-left-20 flex items-center justify-center z-20">
        <i data-lucide="chevron-left" class="w-4 h-4 sm:w-5 sm:h-5 dark:text-text-white"></i>
    </div>

    <div
        class="swiper-button swiper-button-next absolute top-1/2 -translate-y-1/2 -right-9 sm:-right-8! md:-right-10! lg:-right-16 xl:-right-24 2xl:-right-28 3xl:-right-20 flex items-center justify-center z-20">
        <i data-lucide="chevron-right" class="w-4 h-4 sm:w-5 sm:h-5 dark:text-text-white"></i>
    </div>





    <!-- Swiper JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper Init -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 20,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-prev",
                prevEl: ".swiper-button-next",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    slidesPerGroup: 1,
                },
                640: {
                    slidesPerView: 4,
                    slidesPerGroup: 1,
                },
                1024: {
                    slidesPerView: 5,
                    slidesPerGroup: 1,
                },
            },
        });
    </script>
