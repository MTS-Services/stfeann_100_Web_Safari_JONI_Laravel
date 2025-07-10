@props(['product'])


<div class="bg-white dark:bg-bg-dark-primary  overflow-hidden relative group p-4 shadow-lg dark:shadow-shadow-dark-primary/30 hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row gap-3">
    <!-- Image Section -->
    <div class="relative overflow-hidden w-full sm:w-2/5 rounded-lg dark:border border-border-dark-tertiary">
        <a class="absolute inset-0 z-10" href="{{ route('f.detail', $product->slug) }}"></a>
        <img src="{{ $product->primaryImage?->first()?->modified_image }}" alt="{{ $product->name }}"
            class="rounded-lg w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105">
        <div
            class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-25 transition-opacity duration-500">
        </div>
    </div>

    <!-- Info Section -->
    <div class="w-full sm:w-1/2 flex flex-col justify-between p-2 sm:p-4">
        <div>
            <h5 class="text-sm sm:text-xl font-bold text-gray-800 dark:text-white mb-1 line-clamp-1">{{ $product->name }}</h5>

            <!-- Rating -->
            <div class="flex items-center space-x-1 mb-2">
                @for ($i = 0; $i < 4; $i++)
                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                        <polygon
                            points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                    </svg>
                @endfor
                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                    <polygon
                        points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                </svg>
                <span class="text-gray-600 text-xs dark:text-white">(4.0)</span>
            </div>

        </div>
        <!-- Description -->
        <p class="text-gray-600 dark:text-white text-xs sm:text-sm  line-clamp-3 mb-4">
            {{ $product->description }}
        </p>

        <!-- Price & Button -->
        <div class="flex justify-between items-center mt-auto">
            <h4 class="text-base sm:text-2xl font-bold text-black dark:text-white">{{ $product->price }}€</h4>
            <a href="{{ route('f.detail', $product->slug) }}"
                class="inline-flex items-center gap-2 bg-text-primary hover:bg-text-primary/80 text-white dark:text-white text-xs sm:text-base font-semibold rounded-lg px-3 py-2 transition-all duration-300 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white dark:text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m4-9l2 9" />
                </svg>
                View Details
            </a>
        </div>
    </div>
</div>