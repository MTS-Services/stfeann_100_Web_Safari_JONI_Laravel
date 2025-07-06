<x-frontend::layout>
    <section class="bg-white px-4 py-20 sm:py-24 md:py-28 lg:py-32 xl:py-40">
        <div class="container mx-auto max-w-8xl grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

            <!-- Image Slider -->
            <div class="px-0 sm:px-6 md:px-8 lg:px-10 xl:px-13">
                <div class="w-full h-full aspect-square overflow-hidden rounded-lg shadow-lg border-t border-gray-200">
                    <img id="mainImage" src="{{ $product->primaryImage?->first()?->modified_image }}" alt="Main Product"
                        class="w-full h-full object-cover">
                </div>

                <div class="relative">
                    <!-- Left Navigation Button -->
                    <button onclick="scrollThumbnails(-1)"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white border rounded-full shadow p-2">
                        &#8592;
                    </button>

                    <!-- Thumbnails Scroll Container -->
                    <div id="thumbnailScroll" class="flex gap-2 mt-4 overflow-x-auto px-6 scroll-smooth no-scrollbar">

                        @foreach ($product->nonPrimayImages as $thumbImage)
                            <img src="{{ $thumbImage->modified_image }}"
                                class="w-23 sm:w-26 md:w-34 lg:w-32 xl:w-49 h-24 sm:h-28 md:h-32 object-cover cursor-pointer rounded-lg border {{ in_array($thumbImage->modified_image, ['r1.png', 'r2.png', 'r4.png']) ? 'bg-gray-50' : '' }} flex-shrink-0"
                                onclick="document.getElementById('mainImage').src = this.src">
                        @endforeach
                    </div>

                    <!-- Right Navigation Button -->
                    <button onclick="scrollThumbnails(1)"
                        class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white border rounded-full shadow p-2">
                        &#8594;
                    </button>
                </div>
            </div>

            <!-- Product Info -->
            <div class="px-1 sm:px-3 md:px-6">
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
                            <option value="selected disabled hidden">Selecte Size</option>
                            @foreach (App\Models\ProductAttribute::sizeList() as $key => $size)
                                <option value="{{ $key }}"
                                    {{ in_array($key, $product->attribute_values ?? []) ? 'selected' : '' }}>
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
                    <a class="absolute inset-0" href="#"></a>
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

    <x-frontend.detail />

</x-frontend::layout>

<script>
    function scrollThumbnails(direction) {
        const container = document.getElementById('thumbnailScroll');
        container.scrollBy({
            left: direction * 150,
            behavior: 'smooth'
        });
    }
</script>
