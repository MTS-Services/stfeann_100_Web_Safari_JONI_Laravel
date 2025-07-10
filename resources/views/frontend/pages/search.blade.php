<x-frontend::layout>

    <section class="my-24 bg-gray-100 dark:bg-bg-dark-secondary">
        <div class="max-w-6xl mx-auto text-left pt-20">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Search Result</h1>
        </div>
        <!-- Product Grid -->
        <div class="max-w-6xl mx-auto  mt-10 mb-16">
            @if ($searchProducts->isEmpty())
                <div class="col-span-full text-center py-10">
                    <h2 class="text-xl font-semibold text-gray-600 dark:text-white">No products found for your search.</h2>
                </div>
            @else
                <div class="grid  gap-4 sm:gap-6">
                    @foreach ($searchProducts as $product)
                        <x-frontend.search_result :product="$product" />
                    @endforeach
                </div>
            @endif
            <!-- Pagination Info -->
            <div class="mt-4 text-sm text-gray-600 dark:text-white">
                Showing {{ $searchProducts->firstItem() }} to {{ $searchProducts->lastItem() }} of
                {{ $searchProducts->total() }} items
            </div>

            <!-- Pagination Controls -->
            <div class="flex space-x-2 mt-2 items-center justify-end flex-wrap">

                {{-- Prev --}}
                @if ($searchProducts->onFirstPage())
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed dark:text-white">Prev</span>
                @else
                    <a href="{{ $searchProducts->appends(request()->except('page'))->previousPageUrl() }}"
                        class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Prev</a>
                @endif

                {{-- Page Numbers --}}
                @for ($i = 1; $i <= $searchProducts->lastPage(); $i++)
                    <a href="{{ $searchProducts->appends(request()->except('page'))->url($i) }}"
                        class="px-3 py-1 rounded 
           {{ $i == $searchProducts->currentPage() ? 'bg-red-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
                        {{ $i }}
                    </a>
                @endfor

                {{-- Next --}}
                @if ($searchProducts->hasMorePages())
                    <a href="{{ $searchProducts->appends(request()->except('page'))->nextPageUrl() }}"
                        class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded dark:text-white">Next</a>
                @else
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed dark:text-white">Next</span>
                @endif
            </div>


        </div>

    </section>
</x-frontend::layout>
