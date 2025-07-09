@props(['product'])

<div class="bg-white rounded-sm overflow-hidden relative group p-2">
    <a class="absolute inset-0 z-10" href="{{ route('f.detail', $product->slug) }}"></a>

    <!-- Image Container -->
    <div class="relative overflow-hidden lg:min-h-[340px] border border-gray-50">
        <img 
            src="{{ $product->primaryImage?->first()?->modified_image }}" 
            alt="{{ $product->name }}"
            class="rounded-sm w-full sm:h-48 lg:h-full md:w-full md:h-[220px] object-cover transition-transform duration-500 group-hover:scale-110"
        >
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
    </div>

    <!-- Content -->
    <div class="lg:p-4 p-1">
        <h5 class="text-[12px] lg:text-xl font-bold text-gray-800 sm:mt-1 mb-0">
            {{ $product->name }}
        </h5>

        <!-- Ratings -->
        <div class="flex items-center mb-0">
            <div class="flex space-x-1">
                @for ($i = 0; $i < 4; $i++)
                    <svg class="w-3 h-3 lg:w-5 lg:h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                        <polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                    </svg>
                @endfor
                <svg class="w-3 h-3 lg:w-5 lg:h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                    <polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                </svg>
            </div>
            <span class="text-gray-600 text-[12px]">(4.0)</span>
        </div>
    </div>
</div>
