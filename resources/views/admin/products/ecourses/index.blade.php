<x-layout-panel>
    <div class="w-full relative mb-10">
        @include('admin.products.ebooks.modal')
        <div
            class="w-full h-32 bg-gradient-to-br from-orange-500 to-yellow-600 rounded-md flex items-center justify-between gap-5 p-10 relative overflow-hidden">
            <x-bladewind::icon name="book-open" class="!h-44 !w-44 text-white opacity-30 absolute -bottom-8 left-0" />
            <h1 class="text-white text-xl md:text-3xl bold">E-Course</h1>
            <x-bladewind::button outline="true" color="white" class="!text-white" size="regular" tag="a"
                href="{{ route('e-courses.create') }}">
                <div class="w-full flex items-center justify-center gap-1">
                    <x-bladewind::icon name="plus" class="!h-4 !w-4 text-white" />
                    <span>Tambah E-Course</span>
                </div>
            </x-bladewind::button>
        </div>
    </div>
    <x-bladewind::card title="Daftar E-Course" class="w-full relative overflow-x-auto">
        <x-bladewind::table hover_effect="false" divider="thin" striped="true">
            <x-slot name="header">
                <th class="!text-center">No</th>
                <th class="!text-center">Thumbnail</th>
                <th>Judul</th>
                <th class="!text-center">harga</th>
                <th class="!text-center">Kategori</th>
                <th class="!text-center">Status</th>
                <th class="!text-center">Aksi</th>
            </x-slot>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="!text-center !align-middle">{{ $loop->iteration }}</td>
                        <td class="min-w-20 flex justify-center !align-middle items-center">

                            @if ($item->thumbnail)
                                <img src="{{ Storage::url($item->thumbnail) }}" alt="Image category"
                                    class="w-16 h-24 rounded object-cover">
                            @else
                                <img src="{{ asset('/images/dummy/thumbnail-product.jpg') }}" alt="Image category"
                                    class="w-16 h-24 rounded object-cover">
                            @endif
                        </td>
                        <td class="!align-middle">{{ $item->title }}</td>
                        <td class="!text-center !align-middle">Rp. {{ $item->formatPrice($item->price) }}</td>
                        <td class="!text-center !align-middle">
                            <x-bladewind::tag label="{{ $item->category->name }}" shade="dark" color="purple"
                                tiny="true" uppercasing="false" />
                        </td>
                        <td class="!text-center !align-middle">
                            <x-bladewind::tag label="{{ $item->status }}" shade="dark"
                                color="{{ $item->status === 'published' ? 'green' : 'red' }}" tiny="true"
                                uppercasing="false" />
                        </td>
                        <td class="!text-center min-w-28 !align-middle">
                            <x-bladewind::dropmenu>
                                <x-bladewind::dropmenu-item>
                                    <a href="{{ route('products.detail', $item->code) }}" target="_blank">preview</a>
                                </x-bladewind::dropmenu-item>
                                <x-bladewind::dropmenu-item>
                                    <a href="{{ route('e-books.show', $item->code) }}">Detail</a>
                                </x-bladewind::dropmenu-item>
                                <x-bladewind::dropmenu-item>
                                    <a href="{{ route('e-books.edit', $item->code) }}">Edit</a>
                                </x-bladewind::dropmenu-item>
                                <x-bladewind::dropmenu-item
                                    onclick="deleteData({{ $item->id }})">Hapus</x-bladewind::dropmenu-item>
                            </x-bladewind::dropmenu>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-bladewind::table>
    </x-bladewind::card>
</x-layout-panel>
