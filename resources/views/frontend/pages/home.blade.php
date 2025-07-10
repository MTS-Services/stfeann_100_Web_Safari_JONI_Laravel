<x-frontend::layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="page_slug">home</x-slot>

    <section class="relative ">
        <img src="{{ asset('frontend/images/foto.jpg') }}" alt="About Us Background" class="w-full h-[85vh] object-cover">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div
            class="absolute left-1/2 top-[65%] md:left-20 md:top-1/2 !text-center transform -translate-x-1/2 md:-translate-x-0 -translate-y-1/2 z-10  md:text-left">
            <h1 class="text-4xl md:text-8xl font-bold  mb-1/2  text-white dark:text-white">VALGRIT</h1>
            <p class="text-xl md:text-4xl  font-semibold mb-3 text-white dark:text-white">A NOSSA MISSAO</p>
            <a href="#saiba-mais"
                class="inline-block  hover:bg-red-700 hover:text-white text-white dark:text-white bg-text-primary font-semibold text-2xl px-5 py-1 rounded shadow transition duration-300">
                SAIBA MAIS
            </a>
        </div>
    </section>

    <section class="bg-white dark:bg-bg-dark-secondary tablet:py-20 lg:py-14 md:py-10 sm:py-8 py-5 pt-10"
        id="development">
        <div class="relative max-w-[1500px] mx-auto px-4">
            <!-- Swiper Slider -->
            <div class="swiper categorySlider w-full h-full " id="mySwiper">
                <div class="swiper-wrapper">

                    <x-frontend.slide :categories="$categories" />

                </div>
                <!-- Pagination (optional) -->
                <div class="swiper-pagination mt-4"></div>
            </div>

            <!-- Prev Arrow -->

            <!-- Pagination -->
            <div class="swiper-pagination !-bottom-6 sm:!-bottom-7 md:!-bottom-8"></div>

            <!-- Navigation buttons -->
            <div class="hidden 4xl:block">
                <div
                    class="swiper-button swiper-button-prev absolute top-1/2 -translate-y-1/2 -left-9 sm:-left-8! md:-left-10! lg:-left-16xl:-left-24 2xl:-left-28 3xl:-left-20 flex items-center justify-center z-20">
                    <i data-lucide="chevron-left"
                        class="w-4 h-4 sm:w-5 sm:h-5 dark:text-text-white dark:bg-bg-dark-secondary"></i>
                </div>

                <div
                    class="swiper-button swiper-button-next absolute top-1/2 -translate-y-1/2 -right-9 sm:-right-8! md:-right-10! lg:-right-16 xl:-right-24 2xl:-right-28 3xl:-right-20 flex items-center justify-center z-20">
                    <i data-lucide="chevron-right"
                        class="w-4 h-4 sm:w-5 sm:h-5 dark:text-text-white dark:bg-bg-dark-secondary"></i>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div
            class="section-container flex justify-center items-center min-h-[693px] bg-white dark:bg-bg-dark-secondary py-16">
            <div class="w-full max-w-[1200px]">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold dark:bg-bg-dark-secondary mb-4 dark:text-white">Destaques</h2>
                    <p class="text-gray-500 mb-8 text-lg dark:text-white">Descubra nossa coleção premium de roupas
                        fitness</p>
                </div>

                <div class="px-4 sm:px-6 lg:px-0">
                    <div class="flex flex-wrap gap-4 xl:gap-6 justify-center">
                        @foreach ($products as $product)
                            <x-frontend.product :product="$product" />
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section class="flex justify-center items-center min-h-[697px] bg-white dark:bg-bg-dark-secondary py-16">
        <div class="w-full max-w-[1620px] flex flex-col md:flex-row items-center rounded-lg overflow-hidden">
            <!-- Image Side -->
            <div class="md:w-1/2 w-full h-[350px] md:h-[697px] px-4 lg:px-8">
                <img src="{{ asset('frontend/images/a3.jpg') }}" alt="Beautiful Design"
                    class="w-full h-full object-cover rounded-xl">
            </div>


            <!-- Content Side -->
            <div
                class="md:w-1/2 max-w-[1828px] w-full flex flex-col mb-16 justify-start items-center md:items-start p-10 bg-gradient-to-br dark:shadow-shadow-dark-primary/30 dark:border-border-dark-tertiary">
                <h1
                    class="text-2xl md:text-4xl  text-black  mb-6 text-left dark:text-text-white bark:bg-bd-dark-secondary">
                    Experimente a Diferença da Valgrit: Qualidade Que Se Sente em Cada Fibra!</h1>
                <p class="text-lg md:text-xl text-black mb-4 text-left dark:text-white">
                    Na Valgrit, não vendemos apenas roupa desportiva – entregamos uma experiência de performance e
                    conforto incomparáveis.
                    Cada peça é cuidadosamente desenhada e fabricada com os melhores materiais, garantindo que se sinta
                    no seu melhor, quer esteja a superar os seus limites no ginásio ou a desfrutar de uma corrida ao ar
                    livre.
                    <br />
                    <strong>Porque Escolher Valgrit?</strong><br />

                    Durabilidade Superior: Feita para durar, a nossa roupa resiste ao desgaste do treino intenso e às
                    lavagens frequentes, mantendo a sua forma e cor como novas por muito mais tempo. Diga adeus à roupa
                    que cede ou desbota após algumas utilizações!<br />
                    Conforto Inigualável: Selecionamos tecidos respiráveis e de toque suave que se movem consigo,
                    proporcionando liberdade total de movimentos e mantendo a sua pele fresca e seca, mesmo nos treinos
                    mais exigentes. Sinta a diferença de um conforto que o impulsiona.<br />
                    Estilo Que Inspira: Com designs modernos e cortes que realçam a sua silhueta, a roupa Valgrit fará
                    com que se sinta confiante e motivado. Porque sabemos que quando se sente bem, treina melhor.<br />
                    Investimento Inteligente: Ao escolher Valgrit, está a investir em peças que o acompanharão nas suas
                    jornadas desportivas por anos. Menos compras, mais treinos, mais resultados.<br />
                    Não se contente com menos. Eleve o seu treino e o seu estilo com a Valgrit. Sinta a qualidade, viva
                    a performance! Visite a nossa loja online e descubra a peça perfeita para si.
                </p>
            </div>
        </div>
    </section>
    @push('js')
        <!-- Swiper JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Swiper Init -->
        <script>
            var swiper = new Swiper(".categorySlider", {
                loop: true,
                spaceBetween: 20,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
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
                    1280: {
                        slidesPerView: 6,
                        slidesPerGroup: 1,
                    },
                },
            });
        </script>
    @endpush
</x-frontend::layout>
