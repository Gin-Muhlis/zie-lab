<x-layout-panel>
    <div class="w-full">
        @include('admin.data-master.categories.modal')
        <h1 class="text-2xl font-bold mb-5">Kategori</h1>
        <x-bladewind::card class="w-full relative overflow-x-auto">
            <div class="w-full flex t1ems-center justify-start flex-wrap gap-5 mb-7">
                <x-bladewind::button onclick="showModal('create-data')" color="yellow">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="plus" class="!h-4 !w-4 text-white" />
                        <span>Tambah Data</span>
                    </div>
                </x-bladewind::button>
                <x-bladewind::button onclick="showModal('import-data')" color="green">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="document" class="!h-4 !w-4 text-white" />
                        <span>Import Data</span>
                    </div>
                </x-bladewind::button>
                <x-bladewind::button color="green" tag="a" href="{{ route('categories.export') }}">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="document" class="!h-4 !w-4 text-white" />
                        <span>Export Data</span>
                    </div>
                </x-bladewind::button>
            </div>
            <x-bladewind::table hover_effect="false" divider="thin" no_data_message="Data tidak tersedia">
                <x-slot name="header">
                    <th class="!text-center">No</th>
                    <th>Nama</th>
                    <th>Icon</th>
                    <th class="!text-center">Aksi</th>
                </x-slot>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if ($item->icon)
                                <img src="{{ $item->icon }}" alt="Image category" class="w-7 h-7 object-cover">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <x-bladewind::button.circle size="tiny" color="blue" radius="full" icon="eye"
                                onclick="detailData({{ $item->id }})">

                            </x-bladewind::button.circle>
                            <x-bladewind::button.circle size="tiny" color="green" radius="full" icon="pencil"
                                onclick="updateData({{ $item->id }})">

                            </x-bladewind::button.circle>
                            <x-bladewind::button.circle size="tiny" color="red" radius="full" icon="trash"
                                onclick="deleteData({{ $item->id }})">

                            </x-bladewind::button.circle>
                        </td>
                    </tr>
                @endforeach
            </x-bladewind::table>
            <div class="mt-5">
                {{ $data->links() }}
            </div>
        </x-bladewind::card>

        @push('scripts')
            <script>
                let data = @json($data)

                // munculkan detail data
                function detailData(idSearch) {
                    let searchData = data.find(item => item.id == idSearch)

                    $('.input-detail').val(searchData.name)

                    if (searchData.icon == null) {
                        $('.no-image-detail').removeClass('hidden')
                    } else {
                        $('.image-detail').removeClass('hidden')
                        $('.image-detail').attr('src', searchData.icon)
                    }

                    showModal('detail-data')
                }

                // munculkan edit data
                function updateData(idSearch) {
                    let searchData = data.find(item => item.id == idSearch)

                    $('.input-update').val(searchData.name)
                    $('.update-form').attr('action', `${window.location.href}/${searchData.id}`)

                    showModal('update-data')
                }

                // munculkan hapus data
                function deleteData(idSearch) {
                    let searchData = data.find(item => item.id == idSearch)

                    $('.data-delete').text(searchData.name)
                    $('.delete-form').attr('action', `${window.location.href}/${searchData.id}`)

                    showModal('delete-data')
                }
            </script>
        @endpush
</x-layout-panel>
