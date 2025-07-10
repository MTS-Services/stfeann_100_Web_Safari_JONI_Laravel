<x-frontend::layout>
    <section class="relative w-full">
        <img src="{{ asset('frontend/images/shop.png') }}" alt="Fitness BG"
            class="w-full h-[50vh] sm:h-[60vh] md:h-[85vh] object-cover" />
        <div class="absolute inset-0 bg-opacity-50 flex items-center justify-center sm:justify-end px-2 sm:px-8">
            <div class="text-center max-w-[90%] mt-20 sm:mt-0">
                <h1
                    class="text-white text-[30px] sm:text-[60px] md:text-[80px] lg:text-[80px] font-extrabold leading-none uppercase tracking-tight
             mb-5 sm:mb-0">
                    <span class="block sm:mr-20 -mb-4 dark:text-white">Treina</span>
                    <span class="block sm:mr-20 mt-4 dark:text-white">Mais</span>
                </h1>

                <p class="text-red-600 text-lg sm:mr-20 sm:text-2xl md:text-3xl lg:text-4xl font-semibold mt-2 sm:mt-6 dark:text-white">
                    O que fazer para <br />
                    melhorar o teu progresso
                </p>
            </div>
        </div>

    </section>

    <div class="container mx-auto px-4 sm:px-6 lg:px-12 mt-10 mb-16 dark:bg-bg-dark-secondary">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 dark:bg-bg-dark-secondary">

            @foreach ($prods as $product)
                <x-frontend.shop_product :product="$product" />
            @endforeach

        </div>
    </div>

    <div class="flex space-x-3 mt-10 mb-10 justify-center dark:bg-bg-dark-secondary">
        {{-- Previous Button --}}
        @if ($prods->onFirstPage())
            <button
                class="w-12 h-12 bg-gray-400 text-white rounded-md flex items-center justify-center cursor-not-allowed"
                disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button>
        @else
            <a href="{{ $prods->previousPageUrl() }}"
                class="w-12 h-12 bg-red-600 text-white rounded-md flex items-center justify-center hover:bg-red-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        @endif

        {{-- Always show Page 1 --}}
        <a href="{{ $prods->url(1) }}"
            class="w-12 h-12 {{ $prods->currentPage() == 1 ? 'bg-red-700' : 'bg-red-600' }} text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">
            1
        </a>

        @php
            $current = $prods->currentPage();
            $last = $prods->lastPage();
        @endphp

        {{-- Show current page if not 1 --}}
        @if ($current > 1 && $current != $last && $current != 2)
            @if ($current > 3)
                {{-- Show ... if gap --}}
                <span class="w-12 h-12 flex items-center justify-center text-gray-600 text-xl">...</span>
            @elseif($current == 3)
                {{-- Show page 2 if just before 3 --}}
                <a href="{{ $prods->url(2) }}"
                    class="w-12 h-12 bg-red-600 text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">
                    2
                </a>
            @endif

            <a href="{{ $prods->url($current) }}"
                class="w-12 h-12 bg-red-700 text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">
                {{ $current }}
            </a>
        @endif

        {{-- Next page --}}
        @if ($current + 1 < $last)
            <a href="{{ $prods->url($current + 1) }}"
                class="w-12 h-12 bg-red-600 text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">
                {{ $current + 1 }}
            </a>
        @endif

        {{-- Show ... before last page --}}
        @if ($last - $current > 2)
            <span class="w-12 h-12 flex items-center justify-center text-gray-600 text-xl">...</span>
        @endif

        {{-- Always show last page if more than 1 --}}
        @if ($last > 1)
            <a href="{{ $prods->url($last) }}"
                class="w-12 h-12 {{ $prods->currentPage() == $last ? 'bg-red-700' : 'bg-red-600' }} text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">
                {{ $last }}
            </a>
        @endif

        {{-- Next Button --}}
        @if ($prods->hasMorePages())
            <a href="{{ $prods->nextPageUrl() }}"
                class="w-12 h-12 bg-red-600 text-white rounded-md flex items-center justify-center hover:bg-red-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        @else
            <button
                class="w-12 h-12 bg-gray-400 text-white rounded-md flex items-center justify-center cursor-not-allowed"
                disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        @endif
    </div>





</x-frontend::layout>
<script>
    document.getElementById('prevBtn')?.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Previous clicked');
    });

    document.getElementById('nextBtn')?.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Next clicked');
    });
</script>
