

<section class="bg-white mb-8" id="development">
    <div class="container mx-auto max-w-8xl">
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
  <div class="swiper mySwiper w-full h-full">
    <div class="swiper-wrapper ">
 
      <!-- Slide 1 -->
      <div class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
        <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
        <img src="{{ asset('assets/frontend/imagens/r6.png') }}" alt="24/7 Support" class="w-full h-full">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-4">
  <h5 class="text-xl font-bold text-gray-800">Casaco Valgrit Azul</h5>
  <h4 class="text-2xl font-extrabold text-black mt-1 sm:mt-0">45,99€</h4>
</div>

      </div>

      <!-- Slide 2 -->
      <div class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
        <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
        <img src="{{ asset('assets/frontend/imagens/r1.png') }}" alt="Ethereum" class="w-full h-full">
          <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-4">
  <h5 class="text-xl font-bold text-gray-800">Casaco Valgrit Azul</h5>
  <h4 class="text-2xl font-extrabold text-black mt-1 sm:mt-0">45,99€</h4>
</div>
      </div>

      <!-- Slide 3 -->
      <div class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
        <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
        <img src="{{ asset('assets/frontend/imagens/r2.png') }}" alt="Solana" class="w-full h-full">
          <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-4">
  <h5 class="text-xl font-bold text-gray-800">Casaco Valgrit Azul</h5>
  <h4 class="text-2xl font-extrabold text-black mt-1 sm:mt-0">45,99€</h4>
</div>
      </div>

      <!-- Slide 4 -->
      <div class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
        <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
        <img src="{{ asset('assets/frontend/imagens/r3.png') }}" alt="Dogecoin" class="w-full h-full">
         <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-4">
  <h5 class="text-xl font-bold text-gray-800">Casaco Valgrit Azul</h5>
  <h4 class="text-2xl font-extrabold text-black mt-1 sm:mt-0">45,99€</h4>
</div>
      </div>

      <!-- Slide 5 -->
      <div class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
        <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
        <img src="{{ asset('assets/frontend/imagens/r4.png') }}" alt="Bitcoin" class="w-full h-full">
         <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-4">
  <h5 class="text-xl font-bold text-gray-800">Casaco Valgrit Azul</h5>
  <h4 class="text-2xl font-extrabold text-black mt-1 sm:mt-0">45,99€</h4>
</div>
      </div>

      <!-- Slide 6 -->
      <div class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
        <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
        <img src="{{ asset('assets/frontend/imagens/r5.png') }}" alt="Bitcoin" class="w-full h-full">
          <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-4">
  <h5 class="text-xl font-bold text-gray-800">Casaco Valgrit Azul</h5>
  <h4 class="text-2xl font-extrabold text-black mt-1 sm:mt-0">45,99€</h4>
</div>
      </div>
    </div>

    <!-- Pagination (optional) -->
    <div class="swiper-pagination mt-4"></div>
  </div>


<!-- Prev Arrow -->

  <!-- Pagination -->
<div class="swiper-pagination !-bottom-6 sm:!-bottom-7 md:!-bottom-8"></div>



</div>
</div>
</div>
</section>



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
