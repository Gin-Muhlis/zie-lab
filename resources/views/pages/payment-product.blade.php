<x-layout :profileCompany="$profile_company">
    <div class="w-full relative">
        <div class="w-full h-64 bg-second-background absolute top-0 left-0 -z-10"></div>
        <div class="small-container px-5 md:px-0 py-10 relative">
            <x-bladewind::notification />

            <x-bladewind::card class="w-full mb-7">
                <h1 class="text-xl md:text-2xl font-extrabold mb-5">Detail Pembelian</h1>
                <div class="flex items-start justify-start gap-3">
                    <img src="{{ $product->thumbnail ? Storage::url($product->thumbnail) : asset('/images/dummy/thumbnail-product.jpg') }}"
                        alt="Thumbnail Product" class="w-44 object-cover rounded">
                    <div>
                        <h2 class="text-base md:text-lg font-extrabold mb-2">{{ $product->title }}</h2>
                        <p class="text-sm text-slate-400 mb-2">Oleh {{ $product->author->name }}</p>
                        <p class="text-base font-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>

            </x-bladewind::card>

            @if (!Auth::check())
                <x-bladewind::card class="w-full mb-7">

                    <h1 class="mb-8 text-xl md:text-2xl font-bold ">Data diri</h1>

                    <x-bladewind::input name="name" required="true" label="Nama Lengkap"
                        error_message="Nama lengkap tidak boleh kosong" class="mb-3" />

                    <x-bladewind::input type="email" name="email" required="true" label="Email"
                        error_message="Email tidak boleh kosong" class="mb-3" />

                    <x-bladewind::input name="phone" required="true" label="No Telepon"
                        error_message="No telepon tidak boleh kosong" class="mb-3" />

                </x-bladewind::card>
            @endif

            <x-bladewind::card class="w-full mb-7">

                <p class="text-sm mb-2">Terjadi Masalah? <a
                        href="https://wa.me/{{ $profile_company->phone }}?text={{ urlencode('Hallo ' . $profile_company->title . '. Saya ingin bertanya mengenai ...') }}"
                        target="_blank" class="text-blue-500">Hubungi Kami</a></p>
                <x-bladewind::button show_focus_ring="false" color="yellow" can_submit="true" uppercasing="false"
                    class="font-bold w-full text-lg">
                    Bayar Rp. 99.000
                </x-bladewind::button>

            </x-bladewind::card>
        </div>
</x-layout>
