@props(['categories'])


 @foreach ($categories as $category)
        <!-- Slide -->
        <div class="swiper-slide overflow-hidden bg-white dark:bg-bg-dark-secondary rounded-xl flex flex-col items-center border-2 border-gray-200 dark:border-border-dark-tertiary dark:shadow-shadow-dark-primary/30   gap-2 h-auto transition-transform duration-500 group-hover:scale-110 relative p-2">
            <a href="{{ route('f.categoryProduct', $category->slug) }}" class="absolute inset-0 bg-transparent z-10"></a>
            <div class="w-full h-24 md:h-32 lg:h-40 flex items-center justify-center">
                <img src="{{ $category->modified_image }}" alt="{{ $category->name }}" class="w-full h-full object-contain">
            </div>
            <div class="w-full p-1 lg:p-2">
                <p class="text-gray-900 inline-block px-2 py-1 mx-auto w-full text-center rounded-xl text-xs sm:text-sm md:text-base bg-emerald-100">
                    {{ $category->name }}
                </p>
            </div>
        </div>
        @endforeach




   