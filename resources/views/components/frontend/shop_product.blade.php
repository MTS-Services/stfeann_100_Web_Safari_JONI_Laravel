@props(['product'])

<div class="group relative overflow-hidden rounded-lg bg-white dark:bg-bg-dark-secondary shadow-lg transition-all duration-300 hover:shadow-xl dark:shadow-shadow-dark-primary/30  hover:-translate-y-1">
    <a class="absolute inset-0 z-10" href="{{ route('f.detail', $product->slug) }}"
        aria-label="View {{ $product->name }} details"></a>

    <!-- Image Container -->
    <div class="relative aspect-square overflow-hidden border border-gray-50 dark:border-border-dark-tertiary">
        <img src="{{ $product->primaryImage?->first()?->modified_image }}" alt="{{ $product->name }}"
            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy"
            width="340" height="340">
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-20">
        </div>
    </div>

    <!-- Content -->
    <div class="p-1 lg:p-4">
        <h3 class="mb-1 line-clamp-2 text-xs font-bold text-gray-800 dark:text-white  md:text-sm lg:text-base">
            {{ $product->name }}
        </h3>

        <!-- Ratings -->
        <div class="mb-2 flex items-center">
            <div class="flex -space-x-1">
                @for ($i = 0; $i < 4; $i++)
                    <svg class="h-3 w-3 text-yellow-400 md:h-4 md:w-4" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                @endfor
                <svg class="h-3 w-3 text-gray-300 md:h-4 md:w-4" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
            <span class="ml-1 text-xs text-gray-600 dark:text-white">(4.0)</span>
        </div>

        <!-- Price & CTA -->
        <div class="mt-3 flex items-center justify-between gap-2">
            <span class="text-sm font-bold text-black dark:text-white sm:text-base md:text-lg">{{ $product->price }}€</span>
            <button type="button"
                class="flex items-center gap-1 rounded-lg bg-red-500 px-3 py-1.5 text-xs font-semibold text-white dark:text-white shadow transition-colors hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:px-3.5 sm:py-2 sm:text-sm md:px-4 md:py-2.5 md:text-base"
                aria-label="Add {{ $product->name }} to cart">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 " fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="hidden sm:inline">Add to Cart</span>
                <span class="inline sm:hidden">Add</span>
            </button>
        </div>
    </div>
</div>
