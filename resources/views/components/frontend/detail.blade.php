 @props(['product'])

<div class="swiper-slide bg-white dark:bg-bg-dark-secondary rounded-xl flex flex-col border-2 border-gray-200 dark:border-border-dark-tertiary p-4 dark:shadow-shadow-dark-primary/30  gap-4 h-auto sm:h-40 relative">
    <a href="{{ route('f.detail', $product->slug) }}" class="absolute inset-0 bg-transparent z-10"></a>

    <img src="{{ $product->primaryImage?->first()?->modified_image }}" alt="{{ $product->name }}"
        class="w-full h-24 sm:h-28 md:h-32 lg:h-36 xl:h-40 object-cover rounded">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4 space-y-2 sm:space-y-0">
        <h5 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-gray-800 dark:text-white truncate">
            {{ $product->name }}
        </h5>
        <h4 class="text-base sm:text-lg md:text-xl lg:text-2xl font-extrabold text-black dark:text-white">
            {{ $product->price }}€
        </h4>
    </div>
</div>