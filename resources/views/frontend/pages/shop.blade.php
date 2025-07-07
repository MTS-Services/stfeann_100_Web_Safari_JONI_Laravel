<x-frontend::layout>
    <section class="relative w-full">
        <img src="{{ asset('assets/frontend/imagens/shop.png') }}" alt="Fitness BG"
            class="w-full h-[50vh] sm:h-[60vh] md:h-[85vh] object-cover" />

        <div class="absolute inset-0 bg-opacity-50 flex items-center justify-center sm:justify-end px-2 sm:px-8">
            <div class="text-center max-w-[90%] mt-20 sm:mt-0">
                <h1
                    class="text-white text-[30px] sm:text-[60px] md:text-[80px] lg:text-[80px] font-extrabold leading-none uppercase tracking-tight
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
                <x-frontend.shop_product :product="$product" />
            @endforeach

        </div>
    </div>

<div class="flex space-x-3 mt-10 mb-10 justify-center">
  <!-- Prev Button -->
  <button id="prevBtn" class="w-12 h-12 bg-red-600 text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition"> &larr; </button>

  <!-- Page 1 -->
  <button class="w-12 h-12 bg-red-600 text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">1 </button>

  <!-- Page 2 -->
  <button class="w-12 h-12 bg-red-600 text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">  2 </button>

  <!-- Next Button -->
  <button id="nextBtn" class="w-12 h-12 bg-red-600 text-white text-xl font-bold rounded-md flex items-center justify-center hover:bg-red-700 transition">  &rarr; </button>
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
