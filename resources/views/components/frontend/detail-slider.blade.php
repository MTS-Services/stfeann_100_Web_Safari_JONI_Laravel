@props(['product'])

<div id="thumbnailScroll"
    class="flex gap-2 overflow-x-auto scroll-smooth no-scrollbar   w-full cursor-grab">

    @foreach ($product->images as $image)
        <img src="{{ $image->modified_image }}"
            class="w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/4 xl:w-1/4 h-24 sm:h-28 md:h-36 object-cover cursor-pointer flex-shrink-0 rounded-lg shadow-md dark:shadow-shadow-dark-secondary"
            onclick="document.getElementById('mainImage').src = this.src">
    @endforeach

</div>
