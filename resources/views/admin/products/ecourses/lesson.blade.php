@php
    use App\Services\Helper;
@endphp

<x-layout-panel>
    <div class="w-full relative mb-10">
        @include('admin.products.ecourses.modal')
        <div
            class="w-full bg-gradient-to-br from-orange-500 to-yellow-600 rounded-md px-10 pt-10 pb-8 relative overflow-hidden mb-10">
            <x-bladewind::icon name="book-open" class="!h-64 !w-64 text-white opacity-30 absolute -bottom-8 left-0" />
            <h1 class="text-white text-xl md:text-4xl font-bold mb-5">{{ $data->title }}</h1>
            <p class="text-md text-slate-200 mb-5">
                {{ Helper::cutDescriptionProduct($data->description, 40) }}
            </p>
            <div class="flex items-center justify-start gap-5">
                <x-bladewind::tag label="{{ $data->type }}" rounded="true" shade="dark" color="blue" />
                <x-bladewind::tag label="{{ $data->category->name }}" rounded="true" shade="dark" color="purple" />
            </div>
        </div>

        <div class="w-full flex items-center justify-between gap-3 flex-wrap mb-7">
            <h2 class="text-xl md:text-2xl font-bold">Bagian and Materi E-Course</h2>
            <x-bladewind::button onclick="showModal('create-data-section')" color="yellow" size="small">
                <div class="w-full flex items-center justify-center gap-1">
                    <x-bladewind::icon name="plus" class="!h-4 !w-4 text-white" />
                    <span>Tambah Bagian</span>
                </div>
            </x-bladewind::button>
        </div>

        <ul id="main-list">
            @foreach ($sections as $section)
                <li
                    class="bg-white dark:bg-dark-800/30 rounded-lg border border-slate-200 dark:border-dark-600/60 focus:outline-none shadow-sm shadow-slate-200/50 dark:shadow-dark-800/70 mb-5 p-4">

                    <div class="w-full flex items-center justify-between-gap-2 mb-4">
                        <span class="inline-block font-bold">{{ $section->name }}</span>
                        <div class="flex-1 flex items-center justify-end gap-2">
                            <x-bladewind::button.circle size="tiny" color="secondary" radius="full" icon="pencil"
                                onclick="updateData({{ $section->id }})">
                            </x-bladewind::button.circle>
                            <x-bladewind::button.circle size="tiny" color="secondary" radius="full" icon="trash"
                                onclick="deleteData({{ $section->id }})">
                            </x-bladewind::button.circle>
                            <x-bladewind::button onclick="showModal('create-data-section')" outline="true"
                                color="yellow" size="tiny">
                                <div class="w-full flex items-center justify-center gap-1">
                                    <x-bladewind::icon name="plus" class="!h-4 !w-4 text-primary" />
                                    <span>Tambah Materi</span>
                                </div>
                            </x-bladewind::button>
                        </div>
                    </div>
                    <ul>
                        @if ($section->lessons()->exists())
                            @foreach ($section->lessons as $lesson)
                                <li class="mb-3 p-3 rounded shadow-sm border">
                                    {{ $lesson->title }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
    @push('scripts')
        <script>
            let sections = @json($sections);

            $(function() {
                // drag and drop
                let mainList = document.getElementById('main-list');
                let sortable = new Sortable(mainList, {
                    group: 'nested',
                    animation: 150,
                    fallbackOnBody: true,
                    swapThreshold: 0.65,
                    onEnd: function(evt) {
                        console.log("Main list changed", evt);
                    }
                });

                // Untuk sub-list
                document.querySelectorAll('#main-list ul').forEach(function(subList) {
                    new Sortable(subList, {
                        group: 'nested', // Sama grup-nya, biar bisa pindah antar item dan sub-item
                        animation: 150,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        onEnd: function(evt) {
                            console.log("Sub list changed", evt);
                        }
                    });
                });
            })

            // munculkan edit data section
            function updateData(idSearch) {
                let searchData = sections.find(item => item.id == idSearch)

                $('.input-update-name-section').val(searchData.name)
                $('.update-form-section').attr('action', `{{ route('sections.index') }}/${idSearch}`)

                showModal('update-data-section')
            }

            // munculkan hapus data
            function deleteData(idSearch) {
                    let searchData = sections.find(item => item.id == idSearch)
                
                    $('.data-delete-section').text(searchData.name)
                    $('.delete-form-section').attr('action', `{{ route('sections.index') }}/${idSearch}`)

                    showModal('delete-data-section')
                }
        </script>
    @endpush
</x-layout-panel>
