<x-frontend::layout>

    <section class="my-30 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center pt-20">
            <h1 class="text-4xl font-bold text-gray-900">Search Result</h1>
        </div>
        <!-- Product Grid -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-12 mt-10 mb-16">
            @if ($searchProducts->isEmpty())
                <div class="col-span-full text-center py-10">
                    <h2 class="text-xl font-semibold text-gray-600">No products found for your search.</h2>
                </div>
            @else
                <div class="grid grid-cols-2   gap-4 sm:gap-6">
                    @foreach ($searchProducts as $product)
                        <x-frontend.shop_product :product="$product" />
                    @endforeach
                </div>
            @endif
        </div>

    </section>
</x-frontend::layout>
