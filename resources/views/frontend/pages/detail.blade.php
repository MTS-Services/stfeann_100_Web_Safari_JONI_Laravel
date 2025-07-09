<x-frontend::layout>
    @push('cs')
   <style>
    /* Custom scrollbar hide utility */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; 
        /* Add grab cursor when hovering over the scrollable area */
        cursor: grab;
    }
    /* When dragging, show grabbing cursor */
    .no-scrollbar.cursor-grabbing {
        cursor: grabbing;
    }
</style>
    @endpush
    <section class="bg-white px-4 py-20 sm:pt-24 md:pt-28 lg:pt-40   mt-4 lg:mt-8 xl:mt-16">
        <div class="container mx-auto max-w-8xl grid grid-cols-1 md:grid-cols-2 gap-4 items-start">

            <!-- Image Slider -->
<div class="px-0 sm:px-6 md:px-8">
    <div class="w-full h-full aspect-square overflow-hidden shadow-md">
        <img id="mainImage" src="{{ $product->primaryImage?->first()?->modified_image }}" alt="Main Product"
            class="w-full h-full object-cover">
    </div>

    <div class="relative group mt-4 w-full">
        <!-- Left Arrow (hidden by default, visible on hover) -->
        <button id="leftArrow"
            onclick="scrollThumbnails(-1)"
            class="absolute -left-10 top-1/2 -translate-y-1/2 z-10">
            
        </button>

        <!-- Slider thumbnails -->
        <x-frontend.detail-slider :product="$product" />

        <!-- Right Arrow (hidden by default, visible on hover) -->
        <button id="rightArrow"
            onclick="scrollThumbnails(1)"
            class="absolute -right-10 top-1/2 -translate-y-1/2 z-10 ">
            
        </button>
    </div>
</div>


            <!-- Product Info -->
            <div class="px-1 sm:px-3 md:px-6 mt-4">
                <div class="mb-2 text-sm sm:text-base">
                    <p>Home / <span class="">T-shirt Valgrit</span></p>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2">{{ $product->name }}</h1>

                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400 text-xl sm:text-2xl mr-2">★★★★☆</div>
                    <span class="text-xs sm:text-sm text-gray-500">(4.5 Rating)</span>
                </div>

                <!-- Price -->
                <div class="text-xl sm:text-2xl font-bold text-black mb-6">
                    <span class="text-gray-500">Price:</span> {{ $product->price }}€
                </div>

                <!-- Size & Quantity -->
                <div class="flex mb-4 gap-3">
                    <div class="mb-4">
                        <p class="font-semibold mb-2">Size:</p>
                        <select class="border rounded px-7 py-2 w-full sm:w-50">
                            <option value="" selected disabled hidden>Selecionar Tamanho</option>
                            @foreach ($product->attribute_values as $key => $size)
                                <option value="{{ $key }}">
                                    {{ $size }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold mb-2">Quantity:</p>
                        <input type="number" value="1" min="1"
                            class="w-full sm:w-20 border rounded px-2 py-2">
                    </div>
                </div>

                <!-- Add to Cart -->
                <button
                    class="text-white bg-red-500 px-6 py-3 rounded hover:bg-text-primary hover:text-white border transition font-medium relative w-full sm:w-auto">
                    <a class="absolute inset-0" href="javascript:void(0)"></a>
                    Adicionar ao Carrinho
                </button>

                <!-- Description -->
                <div class="mt-6">
                    <h1 class="font-bold text-2xl sm:text-3xl lg:text-4xl mb-2">Descrição</h1>
                    @if ($product->description)
                        <p class="text-gray-700 text-base sm:text-lg md:text-xl lg:text-2xl mb-4">
                            {{ $product->description }}
                        </p>
                    @else
                        <p class="text-gray-700 text-base sm:text-lg md:text-xl lg:text-2xl mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde minus reprehenderit est sint,
                            voluptate omnis! Possimus voluptatem in repellendus, magnam reiciendis nisi veritatis
                            corrupti autem dignissimos fugit aliquid laboriosam. Voluptatibus saepe sequi soluta
                        </p>
                    @endif

                </div>
            </div>

        </div>
    </section>

{{-- related products --}}
    <section class="bg-white pb-24" id="development">
        <div class="container mx-auto max-w-[1820px]">
            <div class="relative px-4 mb-8">
                <div class="text-center px-2 sm:px-0">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold mb-2 sm:mb-4 text-gray-900">
                        Produtos Recomendados
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600">
                        Novos produtos para o seu guarda-roupas
                    </p>
                </div>
            </div>

            <!-- Swiper Slider -->
            <!-- Responsive Padding Wrapper -->
<div class="px-4 sm:px-6 lg:px-8">
    <div class="swiper mySwiper w-full h-full" id="mySwiper">
        <div class="swiper-wrapper">

            @foreach ($related_products as $product)
                <x-frontend.detail :product="$product" />
            @endforeach

        </div>

        <!-- Pagination (optional) -->
        <div class="swiper-pagination mt-4"></div>
    </div>
</div>


            <!-- Prev Arrow -->

            <!-- Pagination -->
            <div class="swiper-pagination !-bottom-6 sm:!-bottom-7 md:!-bottom-8"></div>
        </div>
    </section>



    <!-- Swiper JS CDN -->


    @push('js')
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


      <script>
    function scrollThumbnails(direction) {
        const container = document.getElementById('thumbnailScroll');
        if (container) {
            container.scrollBy({
                left: direction * 150,
                behavior: 'smooth'
            });
        }
    }

    // Show/Hide arrows based on image count and handle drag-to-scroll
    document.addEventListener('DOMContentLoaded', function () {
        const scrollContainer = document.getElementById('thumbnailScroll');
        const leftArrow = document.getElementById('leftArrow');
        const rightArrow = document.getElementById('rightArrow');

        if (scrollContainer) {
            const images = scrollContainer.querySelectorAll('img');

            // Show/Hide arrows based on image count
            if (images.length > 4) {
                // Check if scroll is needed by comparing scrollWidth and clientWidth
                // This is a more robust check than just image count, as image sizes vary.
                // We will defer showing arrows until after the initial render.
                setTimeout(() => { // Give browser time to render and calculate sizes
                    if (scrollContainer.scrollWidth > scrollContainer.clientWidth) {
                        leftArrow.classList.remove('hidden');
                        rightArrow.classList.remove('hidden');
                    }
                }, 100); // Small delay
            }

            // Enable drag to scroll
            let isDown = false;
            let startX;
            let scrollLeft;

            scrollContainer.addEventListener('mousedown', (e) => {
                isDown = true;
                scrollContainer.classList.add('cursor-grabbing');
                startX = e.pageX - scrollContainer.offsetLeft;
                scrollLeft = scrollContainer.scrollLeft;
            });

            scrollContainer.addEventListener('mouseleave', () => {
                isDown = false;
                scrollContainer.classList.remove('cursor-grabbing');
            });

            scrollContainer.addEventListener('mouseup', () => {
                isDown = false;
                scrollContainer.classList.remove('cursor-grabbing');
            });

            scrollContainer.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - scrollContainer.offsetLeft;
                const walk = (x - startX) * 2; // Scroll speed
                scrollContainer.scrollLeft = scrollLeft - walk;

                // Optionally, hide buttons when dragging and show again on mouseup/mouseleave
                // This is a more advanced UX consideration.
                // If you want buttons to disappear while dragging, you'd add:
                // leftArrow.classList.add('hidden');
                // rightArrow.classList.add('hidden');
                // And then re-show them in mouseup/mouseleave (if images.length > 4)
            });
        }
    });
</script>

    @endpush

</x-frontend::layout>
