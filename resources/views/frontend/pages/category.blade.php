<x-frontend::layout>
    <div class="section-container bg-white dark:bg-bg-dark-secondary py-16 min-h-[493px] mt-20 flex flex-col items-center space-y-10">
        <!-- Category Name -->
        <h2 class="text-left! max-w-7xl w-full text-2xl ">
            <span class="text-red-500 font-bold text-3xl">Category Name: </span> {{ $category?->name?? null }}
        </h2>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 w-full max-w-7xl px-4 md:py-10 sm:py-5 py-3 ">
            @foreach ($products as $product)
                <div
                    class="group relative overflow-hidden rounded-md bg-white dark:bg-bg-dark-secondary shadow-sm dark:shadow-shadow-dark-primary hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <!-- Link Overlay -->
                    <a href="{{ route('f.detail', $product->slug) }}" class="absolute inset-0 z-10"
                        aria-label="View {{ $product->name }} details"></a>

                    <!-- Image -->
                    <div class="relative h-[220px] overflow-hidden border border-gray-100 dark:border-border-dark-tertiary">
                        <img src="{{ $product->primaryImage?->first()?->modified_image }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-500">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-3">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white dark:text-whiteline-clamp-2 mb-1">{{ $product->name }}</h3>

                        <!-- Ratings -->
                        <div class="flex items-center mb-1">
                            <div class="flex -space-x-0.5">
                                @for ($i = 0; $i < 4; $i++)
                                    <svg class="h-3.5 w-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <svg class="h-3.5 w-3.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="ml-1 text-xs text-gray-500 dark:text-white">(4.0)</span>
                        </div>

                        <!-- Price & Button -->
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-sm font-bold text-black dark:text-white">{{ $product->price }}€</span>
                            <button type="button"
                                class="flex items-center gap-1 rounded-md bg-red-500 px-2.5 py-1.5 text-white font-medium text-xs hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="hidden sm:inline">Add</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
       
    </div>
</x-frontend::layout>
