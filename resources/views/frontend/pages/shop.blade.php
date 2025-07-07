<x-frontend::layout>
    <section class="relative w-full">
        <img src="{{ asset('assets/frontend/imagens/shop.png') }}" alt="Fitness BG"
            class="w-full h-[50vh] sm:h-[60vh] md:h-[70vh] object-cover" />

        <div class="absolute inset-0 bg-opacity-50 flex items-center justify-center sm:justify-end px-2 sm:px-8">
            <div class="text-center sm:text-right max-w-[90%] mt-20 sm:mt-0">
                <h1
                    class="text-white text-[30px] sm:text-[60px] md:text-[80px] lg:text-[100px] font-extrabold leading-none uppercase tracking-tight
             mb-5 sm:mb-0">
                    <span class="block sm:mr-20 -mb-4">Treina</span>
                    <span class="block sm:mr-20 mt-4">Mais</span>
                </h1>

                <p class="text-red-600 text-lg sm:mr-20 sm:text-2xl md:text-3xl lg:text-4xl font-semibold mt-2 sm:mt-6">
                    O que fazer para <br />
                    melhorar o teu progresso
                </p>
            </div>
        </div>

    </section>

    <!-- Product Grid -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-12 mt-10 mb-16">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

            @foreach ($prods as $product)
                <!-- Product Box -->
                <div class="bg-white rounded-3xl overflow-hidden relative group px-2">

                    <div class="relative overflow-hidden mt-2">
                        <img src="{{ $product->primaryImage?->first()?->modified_image }}" alt="{{ $product->name }}"
                            class="lg:w-full lg:h-[320px] object-cover rounded-xl transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-500">
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        <h5 class="text-xl font-bold text-gray-800 mt-2 mb-3">{{ $product->name }}</h5>
                        <div class="flex items-center mb-4">
                            <div class="flex space-x-1">
                                @for ($i = 0; $i < 4; $i++)
                                    <svg class="md:w-5 md:h-5 w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                        <polygon
                                            points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                                    </svg>
                                @endfor
                                <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                    <polygon
                                        points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                                </svg>
                            </div>
                            <span class="text-gray-600 text-xs ml-2">(4.0)</span>
                        </div>

                        <div class="flex justify-between items-center mt-3">
                            <h4 class="sm:text-sm sm:text-xl font-extrabold text-black">{{ $product->price }}€</h4>
                            <button
                                class="bg-red-600 text-white rounded-lg px-2 py-2 text-base font-semibold hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors flex items-center gap-2 shadow relative">
                                <a class="absolute inset-0" href="Javascript:void(0);"></a>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m4-9l2 9" />
                                </svg>
                                <span class="hidden lg:inline">Add to Cart</span>
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>



</x-frontend::layout>
<script>
    // Dummy example: Pagination buttons click handler
    document.getElementById('prevBtn').addEventListener('click', function(e) {
        e.preventDefault();
        alert('Previous clicked');

    });

    document.getElementById('nextBtn').addEventListener('click', function(e) {
        e.preventDefault();
        alert('Next clicked');


    });
</script>
