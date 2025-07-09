@props(['categories'])


 @foreach ($categories as $category)
                <!-- Slide 1 -->
                
                <div
                    class="swiper-slide overflow-hidden bg-white rounded-xl flex items-center border-2 border-gray-200  gap-4 h-32  transition-transform duration-500 group-hover:scale-110 relative">
                    <a href="javascript:void(0)" class="absolute inset-0 bg-transparent"></a>
                    <img src="{{ $category->modified_image  }}" alt="{{ $category->name}}" class="w-full h-50 object-cover">
                    <div class="flex items-center justify-center  p-1 lg:p-2 ">
                        <p
                            class="text-gray-900 inline-block px-2 py-3 pb-5 mx-auto w-full text-center rounded-xl text-xs lg:text-sm md:text-base bg-emerald-100">
                            {{ $category->name }}</p>
                    </div>
                </div>
                
            @endforeach




   