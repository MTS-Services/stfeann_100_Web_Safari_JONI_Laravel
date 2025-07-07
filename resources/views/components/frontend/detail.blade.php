 @props(['product'])

 <div class="swiper-slide bg-white rounded-xl flex items-center border-2 border-gray-200 p-4 gap-4 h-32 relative">
     <a href="{{ route('f.detail', $product->slug) }}" class="absolute inset-0 bg-transparent"></a>
     <img src="{{ $product->primaryImage?->first()?->modified_image }}" alt="24/7 Support" class="w-full h-full">
     <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-4">
         <h5 class="text-xl font-bold text-gray-800">{{$product->name}}</h5>
         <h4 class="text-2xl font-extrabold text-black mt-1 sm:mt-0">{{$product->price}}€</h4>
     </div>

 </div>