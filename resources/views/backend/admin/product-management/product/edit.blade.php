<x-admin::layout>
    <x-slot name="title">{{ __('Edit Product') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Edit Product') }}</x-slot>
    <x-slot name="page_slug">product</x-slot>


    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Update Product') }}</h2>
                <x-admin.primary-link href="{{ route('pm.product.index') }}">{{ __('Back') }} <i data-lucide="undo-2"
                        class="w-4 h-4"></i> </x-admin.primary-link>
            </div>
        </div>

        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('pm.product.update', encrypt($product->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <!-- Name -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Name') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">
                                <input type="text" placeholder="Name" id="name" value="{{ $product->name }}"
                                    name="name" class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <!-- Slug -->
                        <div class="space-y-2">
                            <p class="label">{{ __('slug') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">

                                <input type="text" name="slug" id="slug" value="{{ $product->slug }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>
                        {{-- Category --}}
                        <div class="space-y-2">
                            <p class="label">{{ __('Category') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <select name="category_id" class="select select2">
                                <option value="" selected disabled>{{ __('Select Category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>

                        <!-- Price -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Price') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">

                                <input type="number" name="price" value="{{ $product->price }}" class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>
                        <!-- Stock -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Stock No') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">

                                <input type="text" name="stock_no" value="{{ $product->stock_no }}"
                                    class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('stock_no')" />
                        </div>
                        {{-- Size --}}
                        <div class="space-y-2">
                            <p class="label">
                                {{ __('Available Size') }} <span class="text-red-500">*</span>
                            </p>
                            <select name="attribute_values[]" class="select select2" multiple>
                                @foreach (App\Models\ProductAttribute::sizeList() as $key => $size)
                                    <option value="{{ $key }}"
                                        {{ in_array($key, $product->attribute_values ?? []) ? 'selected' : '' }}>
                                        {{ $size }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('attribute_values')" />
                        </div>

                        {{-- Description --}}
                        <div class="space-y-2 sm:col-span-2">
                            <p class="label">{{ __('Description') }}</p>
                            <textarea name="description" id="description" cols="" rows="10" class="textarea">{{ old('description', $product->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                        {{-- image --}}
                        <div class="space-y-2 sm:col-span-2 mt-3">
                            <p class="label">{{ __('Primary Image') }}</p>
                            <input type="file" name="image" class="filepond" id="image"
                                accept="image/jpeg, image/png, image/jpg, image/webp, image/svg">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>{{-- image --}}
                        <div class="space-y-2 sm:col-span-2 mt-3">
                            <p class="label">{{ __('Image') }}</p>
                            <input type="file" name="images[]"
                                accept="image/jpeg, image/png, image/jpg, image/webp, image/svg" class="filepond"
                                multiple id="images">
                            <x-input-error class="mt-2" :messages="$errors->get('images')" />
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <x-admin.primary-button>{{ __('Update') }}</x-admin.primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('js')
        <script src="{{ asset('assets/js/ckEditor5.js') }}"></script>
        <script src="{{ asset('assets/js/filepond.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const existingFiles = {
                    "#image": "{{ $product?->primaryImage?->first()?->modified_image }}",
                }
                const existingMultiFiles = {
                    "#images": @json($product->nonPrimayImages->map(fn($img) => $img->modified_image)->toArray()),
                }
                console.log(existingMultiFiles);

                file_upload(["#image"], ['image/jpeg', 'image/png', 'image/jpg', 'image/webp', 'image/svg'],
                    existingFiles);
                file_upload(["#images"], ['image/jpeg', 'image/png', 'image/jpg', 'image/webp', 'image/svg'],
                    existingMultiFiles, true);
            });
        </script>
    @endpush
</x-admin::layout>
