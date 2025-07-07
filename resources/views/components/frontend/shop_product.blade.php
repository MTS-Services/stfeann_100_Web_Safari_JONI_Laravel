@props(['product'])


<div class="bg-white rounded-3xl overflow-hidden relative group px-2">
    <a class="absolute inset-0 z-10" href="{{ route('f.detail', $product->slug) }}"></a>
                    <div class="relative overflow-hidden mt-4">
                        <img src="{{ $product->primaryImage?->first()?->modified_image }}" alt="{{ $product->name }}"
                            class="w-full h-[320px] object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-500">
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        <h5 class="text-xl font-bold text-gray-800 mt-2 mb-3">{{ $product->name }}</h5>
                        <div class="flex items-center mb-4">
                            <div class="flex space-x-1">
                                @for ($i = 0; $i < 4; $i++)
                                    <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                        <polygon
                                            points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                                    </svg>
                                @endfor
                                <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                    <polygon
                                        points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36" />
                                </svg>
                            </div>
                            <span class="text-gray-600 text-xs ml-2">(4.0)</span>
                        </div>

                        <div class="flex justify-between items-center mt-3">
                            <h4 class="text-2xl font-extrabold text-black">{{ $product->price }}€</h4>
                            <button
                                class="bg-indigo-500 text-white rounded-lg px-4 py-2 text-base font-semibold hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors flex items-center gap-2 shadow relative">
                                <a class="absolute inset-0" href="Javascript:void(0);"></a>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m4-9l2 9" />
                                </svg>
                                <span class="hidden lg:inline">Add to Cart</span>
                            </button>
                        </div>
                    </div>

                </div>