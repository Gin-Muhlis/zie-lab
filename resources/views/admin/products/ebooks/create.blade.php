@php
    use App\Services\Helper;
@endphp
<x-layout-panel>
    <div class="w-full">
        <h1 class="text-2xl font-bold mb-5">Tambah E-Book Baru</h1>
        <div class="w-full flex items-start justify-between gap-5 flex-wrap">
            <div class="w-full flex items-center justify-end gap-5">
                <x-bladewind::button color="red"  outline="true">
                    Save Draft
                </x-bladewind::button>
                <x-bladewind::button color="green"  outline="false">
                    Publish
                </x-bladewind::button>
            </div>
            <form method="post" action="{{ route('e-books.store') }}"
                class="update-form flex flex-col items-start justify-start gap-5 flex-1" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-bladewind::card title="Tambahkan informasi mengenai E-Book" class="w-full relative">
                    <div class="w-full flex items-start justify-start flex-wrap md:flex-nowrap gap-5">
                        <x-bladewind::input name="title" required="true" label="Judul"
                            error_message="Judul tidak boleh kosong" class="w-full" />
                        <x-bladewind::input type="file" name="thumbnail" required="false" label="Thumbnail"
                            class="image-input-create" />

                    </div>
                    <div class="w-full flex items-start justify-start flex-wrap md:flex-nowrap gap-5">
                        <x-bladewind::input numeric="true" name="price" required="true" label="Harga"
                            error_message="Harga tidak boleh kosong" class="w-full" />

                        <div class="w-full">
                            <select name="category_id" id="category_id"
                                class="!outline-none !ring-0 border-2 w-full text-slate-600 dark:text-dark-300 border-slate-300/50  dark:border-dark-600 dark:bg-transparent /*dark-800*/ focus:outline-none focus:border-2 focus:border-primary-500 dark:focus:border-dark-500 dark:placeholder-dark-400/60 transition-all rounded-md text-sm px-3.5 py-[12px]">
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </x-bladewind::card>
                <x-bladewind::card title="Jelaskan tentang E-Book" class="w-full relative">
                    <x-bladewind::textarea placeholder="Deskripsi Produk" name="description" toolbar="true"
                        error_message="Deskripsi boleh kosong"></x-bladewind::textarea>
                </x-bladewind::card>
                <x-bladewind::card title="Upload file E-Book" class="w-full relative">
                    <x-bladewind::input type="file" name="file_book" required="true1" label="Thumbnail" />
                </x-bladewind::card>

            </form>
            <div class="relative w-80">
                <div class="w-full text-center h-14 border bg-white flex items-center justify-center">
                    Preview Produk
                </div>
                <div class="w-full flex items-center justify-center p-5 border border-gray-200">
                    <div
                        class="bg-gray-500 w-56 h-80 border rounded-lg overflow-hidden relative bg-cover bg-center flex-shrink-0">
                        <div
                            class="bg-primary rounded-md flex items-center justify-center px-3 py-1 text-xs text-white text-center absolute top-3 right-3 z-10">
                            Nama Kategori</div>
                        <div
                            class="bg-white rounded-md p-3 z-10 absolute bottom-5 left-1/2 -translate-x-1/2 w-11/12 h-28">
                            <h5 class="text-md font-bold mb-2 leading-5">
                                {{ Helper::cutTitleProductCard('Judul Produk', 3) }}</h5>
                            <div
                                class="bg-secondary rounded-md px-2 py-1 text-[8px] text-white text-center absolute left-3 -top-3">
                                E-Book</div>
                            <p class="text-xs text-slate-400 mb-2">Oleh {{ auth()->user()->name }}</p>
                            <p class="text-sm font-bold">Rp. {{ number_format(99999, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-panel>
