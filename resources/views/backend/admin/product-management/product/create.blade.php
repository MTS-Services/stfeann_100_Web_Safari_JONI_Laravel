<x-admin::layout>
    <x-slot name="title">{{ __('Create Product') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Create Product') }}</x-slot>
    <x-slot name="page_slug">product</x-slot>


    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Create Product') }}</h2>
                <x-admin.primary-link href="{{ route('pm.product.index') }}">{{ __('Back') }} <i data-lucide="undo-2"
                        class="w-4 h-4"></i> </x-admin.primary-link>
            </div>
        </div>

        <div
            class="grid grid-cols-1 gap-4 sm:grid-cols-1  {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ route('pm.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <!-- Name -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Name') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">
                                <input type="text" placeholder="Name" id="name" value="{{ old('name') }}"
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

                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
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
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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

                                <input type="number" name="price" value="{{ old('price') }}" class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>
                        <!-- Stock -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Stock No') }}
                                <span class="text-red-500">*</span>
                            </p>
                            <label class="input flex items-center gap-2">

                                <input type="text" name="stock_no" value="{{ old('stock_no') }}" class="flex-1" />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('stock_no')" />
                        </div>
                        {{-- Size --}}
                        <div class="space-y-2">
                            <p class="label">
                                {{ __('Available Size') }} <span class="text-red-500">*</span>
                            </p>
                            <select name="attribute_values[]" class="select select2 " multiple>
                                {{-- <option value="" hidden disabled>Select Size</option> --}}
                                @foreach (App\Models\ProductAttribute::sizeList() as $key => $size)
                                    <option value="{{ $key }}"
                                        {{ collect(old('attribute_values'))->contains($key) ? 'selected' : '' }}>
                                        {{ $size }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('attribute_values')" />
                        </div>

                        {{-- Description --}}
                        <div class="space-y-2 sm:col-span-2">
                            <p class="label">{{ __('Description') }}</p>
                            <textarea name="description" id="description" cols="" rows="10" class="textarea"></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
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
                            accept="image/jpeg, image/png, image/jpg, image/webp, image/svg" class="filepond" multiple
                            id="images">
                        <x-input-error class="mt-2" :messages="$errors->get('images')" />
                    </div>
                    <div class="flex justify-end mt-5">
                        <x-admin.primary-button>{{ __('Create') }}</x-admin.primary-button>
                    </div>
                </form>
            </div>

            {{-- documentation will be loded here and add md:col-span-2 class --}}

        </div>
    </section>
    @push('js')
        <script src="{{ asset('assets/js/ckEditor5.js') }}"></script>
        <script src="{{ asset('assets/js/filepond.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                file_upload(["#image"], ["image/jpeg", "image/png", "image/jpg, image/webp, image/svg"]);
                file_upload(["#images"], ["image/jpeg", "image/png", "image/jpg, image/webp, image/svg"]);
            });
        </script>
    @endpush
</x-admin::layout>
