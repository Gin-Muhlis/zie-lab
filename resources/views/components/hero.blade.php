<div class="w-full bg-second-background">
    <div class="medium-container px-5 py-10 h-hero flex items-center justify-between gap-5 flex-col md:flex-row md:px-0">
        <div>
            <h1 class="text-white text-2xl font-extrabold w-full mb-3 leading-10 md:text-4xl md:leading-[50px]">
                Dapatkan
                Berbagai E-Course dan E-Book Dengan Mudah</h1>
            <p class="text-primary-background mb-7 text-sm ">Tersedia banyak e-course dan e-book dengan berbagai kategori
                yang menarik
            </p>
            <div class="flex items-center justify-between gap-3 w-full">
                <div
                    class="border border-primary rounded-md bg-slate-300 w-full h-10 pl-3 flex-1 flex items-center justify-start overflow-hidden">
                    <x-bladewind::icon name="magnifying-glass" type="solid"
                        class="!h-7 !w-7 md:!h-5 md:!w-5 text-amber-500" />
                    <input type="text"
                        class="border-none outline-none bg-transparent focus:outline-none text-black w-full" id="input-search-hero">
                </div>
                <div class="basis-28 font-lato">
                    <x-bladewind::button show_focus_ring="false" color="yellow" uppercasing="false" size="small"
                        class="font-bold btn-search-hero">
                        Cari Produk
                    </x-bladewind::button>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/hero-image.png') }}" alt="Hero image" class="w-4/5">
    </div>
    <form action="{{ route('products.list') }}" class="hidden" id="form-search-hero">
        <input type="hidden" name="search" id="input-value-search">
    </form>
</div>
