@php
    use App\Services\Helper;
@endphp

<x-layout-panel>
    <div class="w-full">
        <h1 class="text-2xl font-bold mb-5">Detail E-File</h1>
        <div class="w-full flex items-start justify-between gap-5 flex-wrap">
            <div class="w-full flex items-center justify-start=">
                <a href="{{ route('e-files.index') }}"
                    class="flex items-center justify-center gap-1 text-sm text-gray-400">
                    <x-bladewind::icon name="arrow-left" class="!h-4 !w-4" />
                    Kembali
                </a>
            </div>
            <div class="flex flex-col items-start justify-start gap-5 flex-1">
                <x-bladewind::card title="Informasi mengenai E-Book" class="w-full relative">
                    <div class="w-full flex items-start justify-start flex-wrap md:flex-nowrap gap-5">
                        <x-bladewind::input name="title" label="Judul" class="w-full product-name-input"
                            selected_value="{{ $data->title }}" readonly />

                    </div>
                    <div class="w-full flex items-start justify-start flex-wrap md:flex-nowrap gap-5">
                        <x-bladewind::input name="price" label="Harga" class="w-full product-price-input"
                            selected_value="{{ $data->formatPrice($data->price) }}" readonly />

                        <x-bladewind::input name="category" label="Kategori" class="w-full product-price-input"
                            selected_value="{{ $data->category->name }}" readonly />
                    </div>

                </x-bladewind::card>

                <x-bladewind::card title="Deskripsi" class="w-full relative">
                    {!! $data->description !!}
                </x-bladewind::card>

                <x-bladewind::card title="Link Download" class="w-full relative">
                    <x-bladewind::input label="Link download" selected_value="{{ $data->link_gdrive ?? '' }}" readonly />
                </x-bladewind::card>

                <x-bladewind::card title="Benefit" class="w-full relative">
                    <div class="benefits-wrapper mb-5">
                        @foreach ($data->benefits as $benefit)
                            <x-bladewind::input name="benefit{{ $loop->iteration }}"
                                label="Benefit {{ $loop->iteration }}" class="w-full product-name-input"
                                selected_value="{{ $benefit->benefit }}" readonly />
                        @endforeach
                    </div>
                </x-bladewind::card>
            </div>

            <div class="relative w-80">
                <div class="w-full text-center h-14 border bg-white flex items-center justify-center">
                    Preview Produk
                </div>
                <div class="w-full flex items-center justify-center p-5 border border-gray-200">
                    <div class="w-56 h-80 border rounded-lg overflow-hidden relative bg-cover bg-center flex-shrink-0 product-thumbnail-preview"
                        style="background-image: url('{{ Storage::url($data->thumbnail) }}')">
                        <div
                            class="bg-primary rounded-md flex items-center justify-center px-3 py-1 text-xs text-white text-center absolute top-3 right-3 z-10 product-category-preview">
                            {{ $data->category->name }}</div>
                        <div
                            class="bg-white rounded-md p-3 z-10 absolute bottom-5 left-1/2 -translate-x-1/2 w-11/12 h-28">
                            <h5 class="text-md font-bold mb-2 leading-5 mt-1 product-name-preview">
                                {{ $data->title }}
                            </h5>
                            <div
                                class="bg-secondary rounded-md px-2 py-1 text-[8px] text-white text-center absolute left-3 -top-3">
                                E-Book</div>
                            <p class="text-xs text-slate-400 mb-2">Oleh {{ $data->author->name }}</p>
                            <p class="text-sm font-bold">Rp. <span
                                    class="product-price-preview">{{ $data->formatPrice($data->price) }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout-panel>
