<x-layout-panel>
    <div class="w-full">
        @include('admin.data-master.users.modal')
        <h1 class="text-2xl font-bold mb-5">Pengguna</h1>
        <x-bladewind::card class="w-full relative overflow-x-auto">
            <div class="w-full flex items-center justify-start flex-wrap gap-3 mb-7">
                <x-bladewind::button onclick="showModal('create-data')" color="yellow">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="plus" class="!h-4 !w-4 text-white" />
                        <span>Tambah</span>
                    </div>
                </x-bladewind::button>
                <x-bladewind::button onclick="showModal('import-data')" color="green">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="document" class="!h-4 !w-4 text-white" />
                        <span>Import</span>
                    </div>
                </x-bladewind::button>
                <x-bladewind::button color="green" tag="a" href="{{ route('users.export') }}">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="document" class="!h-4 !w-4 text-white" />
                        <span>Export</span>
                    </div>
                </x-bladewind::button>
            </div>
            <x-bladewind::table hover_effect="false" divider="thin" no_data_message="Data tidak tersedia">
                <x-slot name="header">
                    <th class="!text-center">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th class="!text-center">Avatar</th>
                    <th class="!text-center">Aksi</th>
                </x-slot>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td class="min-w-20 flex justify-center">
                            @if ($item->image)
                                <img src="{{ $item->image }}" alt="Image category" class="w-10 h-10 object-cover">
                            @else
                            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-center text-white font-bold">
                                {{ $item->getInitial() }}
                            </div>
                            @endif
                        </td>
                        <td class="text-center min-w-36">
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
                let data = @json($data);
                data = data.data
                // munculkan detail data
                function detailData(idSearch) {
                    let searchData = data.find(item => item.id == idSearch)

                    $('.name-input-detail').val(searchData.name)
                    $('.phone-input-detail').val(searchData.phone)
                    $('.email-input-detail').val(searchData.email)

                    if (searchData.image == null) {
                        $('.no-image-detail').removeClass('hidden')
                        $('.no-image-detail').addClass('flex')

                        let nameSplit = searchData.name.split(' ')
                        if (nameSplit.length >= 2) {
                            let initial = `${nameSplit[0].charAt(0).toUpperCase()}${nameSplit[1].charAt(0).toUpperCase()}`
                            $('.no-image-detail').text(initial)
                        } else {
                            let initial = nameSplit[0].charAt(0).toUpperCase()
                            $('.no-image-detail').text(initial)
                        }
                    } else {
                        $('.image-detail').removeClass('hidden')
                        $('.image-detail').attr('src', searchData.image)
                    }

                    showModal('detail-data')
                }

                // munculkan edit data
                function updateData(idSearch) {
                    let searchData = data.find(item => item.id == idSearch)

                    $('.name-input-update').val(searchData.name)
                    $('.email-input-update').val(searchData.email)
                    $('.phone-input-update').val(searchData.phone)
                    $('.update-form').attr('action', `${window.location.href}/${searchData.id}`)

                    if (searchData.image != null) {
                        $('.image-preview-update').removeClass('hidden')
                        $('.image-preview-update').attr('src', searchData.image)
                    } else {
                        $('.blank-image-update').removeClass('hidden')
                    }

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
    </div>
</x-layout-panel>
