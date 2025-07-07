<x-admin::layout>
    <x-slot name="title">{{ __('Product List') }}</x-slot>
    <x-slot name="breadcrumb">{{ __('Product List') }}</x-slot>
    <x-slot name="page_slug">product</x-slot>
    <section>

        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-text-black dark:text-text-white">{{ __('Product List') }}</h2>
                <div class="flex items-center gap-2">
                    <x-admin.primary-link secondary="true" href="{{ route('pm.product.trash') }}">{{ __('Trash') }} <i
                            data-lucide="trash-2" class="w-4 h-4"></i>
                    </x-admin.primary-link>
                    <x-admin.primary-link href="{{ route('pm.product.create') }}">{{ __('Add') }} <i
                            data-lucide="plus" class="w-4 h-4"></i>
                    </x-admin.primary-link>
                </div>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-6">
            <table class="table datatable table-zebra">
                <thead>
                    <tr>
                        <th width="5%">{{ __('SL') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Featured') }}</th>
                        <th>{{ __('Created By') }}</th>
                        <th>{{ __('Created Date') }}</th>
                        <th width="10%">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>

    {{-- Details Modal --}}
    <x-admin.details-modal />

    @push('js')
        <script src="{{ asset('assets/js/datatable.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let table_columns = [
                    //name and data, orderable, searchable
                    ['name', true, true],
                    ['category_id', true, true],
                    ['price', true, true],
                    ['status', true, true],
                    ['is_featured', true, true],
                    ['created_by', true, true],
                    ['created_at', true, true],
                    ['action', false, false],
                ];
                const details = {
                    table_columns: table_columns,
                    main_class: '.datatable',
                    displayLength: 10,
                    main_route: "{{ route('pm.product.index') }}",
                    order_route: "{{ route('update.sort.order') }}",
                    export_columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    model: 'Product',
                };
                // initializeDataTable(details);

                initializeDataTable(details);
            })
        </script>

        {{-- Details Modal --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                $(document).on('click', '.view', function() {
                    const id = $(this).data('id');
                    const route = "{{ route('pm.product.show', ':id') }}";

                    const details = [{
                            label: '{{ __('Name') }}',
                            key: 'name',
                        },
                        {
                            label: '{{ __('Price') }}',
                            key: 'price',
                        },
                        {
                            label: '{{ __('Image') }}',
                            key: 'image',
                            type: 'image',
                        },
                        {
                            label: '{{ __('Available Sizes') }}',
                            key: 'productAttributes',
                            loop: true,
                            loopKey: 'attribute_value',
                        },
                        {
                            label: '{{ __('Category') }}',
                            key: 'category_name',
                        },
                        {
                            label: '{{ __('Status') }}',
                            key: 'status_label',
                            label_color: 'status_color',
                            type: 'badge',
                        },
                        {
                            label: '{{ __('Featured') }}',
                            key: 'featured_label',
                            label_color: 'featured_color',
                            type: 'badge',
                        },
                        {
                            label: '{{ __('Decsription') }}',
                            key: 'description',
                        },
                        {
                            label: '{{ __('Stock No') }}',
                            key: 'stock_no',
                        },
                    ];

                    showDetailsModal(route, id, '{{ __('Product Details') }}', details);
                });
            });
        </script>
    @endpush
</x-admin::layout>
