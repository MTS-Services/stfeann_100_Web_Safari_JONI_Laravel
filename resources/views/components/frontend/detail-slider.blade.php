@props(['product'])


<div id="thumbnailScroll" class="flex gap-2 mt-4 overflow-x-auto object-cover px-6 scroll-smooth no-scrollbar">

    @foreach ($product->images as $image)
        <img src="{{ $image->modified_image }}"
            class="w-23 sm:w-26 md:w-34 lg:w-32 xl:w-49 h-24 sm:h-28 md:h-36 object-cover cursor-pointer flex-shrink-0 rounded-lg border"
            onclick="document.getElementById('mainImage').src = this.src">
    @endforeach
</div>
