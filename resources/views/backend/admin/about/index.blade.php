<x-admin::layout>
    <x-slot name="title">{{ isset($about) ? __('Edit About') : __('Create About') }}</x-slot>
    <x-slot name="breadcrumb">{{ isset($about) ? __('Edit About') : __('Create About') }}</x-slot>
    <x-slot name="page_slug">about</x-slot>

    <section>
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">
                    {{ isset($about) ? __('Edit About') : __('Create About') }}
                </h2>
                <x-admin.primary-link href="{{ route('about.index') }}">
                    {{ __('Back') }} <i data-lucide="undo-2" class="w-4 h-4"></i>
                </x-admin.primary-link>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-1 {{ isset($documentation) && $documentation ? 'md:grid-cols-7' : '' }}">
            <!-- Form Section -->
            <div class="glass-card rounded-2xl p-6 md:col-span-5">
                <form action="{{ isset($about) ? route('about.storeOrUpdate', encrypt($about->id)) : route('about.storeOrUpdate') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($about))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <!-- Title -->
                        <div class="space-y-2">
                            <p class="label">{{ __('Title') }} <span class="text-red-500">*</span></p>
                            <label class="input flex items-center px-2">
                                <input type="text" placeholder="title" value="{{ old('title', $about->title ?? '') }}"
                                       name="title" class="flex-1"  />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- Description -->
                        <div class="space-y-2 sm:col-span-2">
                            <p class="label">{{ __('Description') }} <span class="text-red-500">*</span></p>
                            <textarea name="description" rows="5" class="textarea"
                                >{{ old('description', $about->description ?? '') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <!-- Our Mission -->
                        <div class="space-y-2 sm:col-span-2">
                            <p class="label">{{ __('Our Mission') }} <span class="text-red-500">*</span></p>
                            <textarea name="our_mission" rows="5" class="textarea"
                                >{{ old('our_mission', $about->our_mission ?? '') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('our_mission')" />
                        </div>

                        <!-- Vision -->
                        <div class="space-y-2 sm:col-span-2">
                            <p class="label">{{ __('Vission') }} <span class="text-red-500">*</span></p>
                            <textarea name="vission" rows="5" class="textarea"
                                >{{ old('vission', $about->vission ?? '') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('vission')" />
                        </div>

                        <!-- Sustainable Commitment -->
                        <div class="space-y-2 sm:col-span-2">
                            <p class="label">{{ __('Sustainable Commitment') }} <span class="text-red-500">*</span></p>
                            <textarea name="sustainable_commitment" rows="5" class="textarea"
                                >{{ old('sustainable_commitment', $about->sustainable_commitment ?? '') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('sustainable_commitment')" />
                        </div>

                        <!-- Image -->
                        <div class="space-y-2 sm:col-span-2">
                            <p class="label">{{ __('Image') }}</p>
                            <input type="file" name="image" class="filepond" id="image"
                                   accept="image/jpeg, image/png, image/jpg, image/webp, image/svg+xml">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            @if(isset($about) && $about->image)
                                <img src="{{ asset($about->image) }}" alt="Current Image"
                                     class="mt-2 w-32 rounded shadow">
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-admin.primary-button>
                            {{ isset($about) ? __('Update') : __('Create') }}
                        </x-admin.primary-button>
                    </div>
                </form>
            </div>
            {{-- Documentation will be loaded here, if needed --}}
        </div>
    </section>

    @push('js')
        <script src="{{ asset('assets/js/ckEditor5.js') }}"></script>
        <script src="{{ asset('assets/js/filepond.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                file_upload(["#image"], [
                    "image/jpeg", "image/png", "image/jpg", "image/webp", "image/svg+xml"
                ]);
            });
        </script>
    @endpush
</x-admin::layout>
