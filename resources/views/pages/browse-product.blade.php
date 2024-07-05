<x-layout>
    <div class="medium-container px-5 md:px-0 py-10 relative">
        <div class="w-full flex items-start justify-start">
            <div
                class="w-60 bg-white border absolute -left-60 top-0 px-5 h-hero z-20 filter-field transition-all duration-500 md:relative md:-left-0 md:bg-transparent">
                <div
                    class="w-6 h-6 rounded-full bg-second-background flex items-center justify-center absolute right-2 top-2 text-white close-filter md:hidden">
                    <x-bladewind::icon name="x-mark"
                        class="!h-4 !w-4 cursor-pointer open-list transition-all duration-500" />
                </div>
                <h2 class=" text-xl md:text-2xl font-extrabold mb-5">Filter Produk</h2>
                <div class="w-full relative border-b-2 border-slate-500 pb-3 parent-filter mb-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-bold ">Tipe</span>
                        <x-bladewind::icon name="chevron-down"
                            class="!h-6 !w-6 cursor-pointer open-list transition-all duration-500" />
                    </div>
                    <div
                        class="w-full h-0 overflow-hidden transition-all duration-500 list-filter flex flex-col items-start justify-start gap-3">
                        <a href="#"
                            class="w-full p-2 rounded-md text-second-background bg-transparent cursor-pointer text-sm transition-all duration-500 hover:bg-second-background hover:text-white">
                            E-Book
                        </a>
                        <a href="#"
                            class="w-full p-2 rounded-md text-second-background bg-transparent cursor-pointer text-sm transition-all duration-500 hover:bg-second-background hover:text-white">
                            E-Course
                        </a>
                        <a href="#"
                            class="w-full p-2 rounded-md text-second-background bg-transparent cursor-pointer text-sm transition-all duration-500 hover:bg-second-background hover:text-white">
                            E-File
                        </a>
                    </div>
                </div>
                <div class="w-full relative border-b-2 border-slate-500 pb-3 parent-filter mb-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-bold ">kategori</span>
                        <x-bladewind::icon name="chevron-down"
                            class="!h-6 !w-6 cursor-pointer open-list transition-all duration-500" />
                    </div>
                    <div
                        class="w-full h-0 overflow-hidden transition-all duration-500 list-filter flex flex-col items-start justify-start gap-3">
                        <a href="#"
                            class="w-full p-2 rounded-md text-second-background bg-transparent cursor-pointer text-sm transition-all duration-500 hover:bg-second-background hover:text-white">
                            E-Book
                        </a>
                        <a href="#"
                            class="w-full p-2 rounded-md text-second-background bg-transparent cursor-pointer text-sm transition-all duration-500 hover:bg-second-background hover:text-white">
                            E-Course
                        </a>
                        <a href="#"
                            class="w-full p-2 rounded-md text-second-background bg-transparent cursor-pointer text-sm transition-all duration-500 hover:bg-second-background hover:text-white">
                            E-File
                        </a>
                    </div>
                </div>
                <div class="w-full relative border-b-2 border-slate-500 pb-3 parent-filter mb-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-bold ">Harga</span>
                        <x-bladewind::icon name="chevron-down"
                            class="!h-6 !w-6 cursor-pointer open-list transition-all duration-500" />
                    </div>
                    <div
                        class="w-full h-0 overflow-hidden transition-all duration-500 list-filter flex flex-col items-start justify-start gap-3">
                        <div class="flex flex-col items-start justify-start gap-1 text-sm">
                            <label>Minimum Harga</label>
                            <x-bladewind::input placeholder="Rp. 0" name="min_price" numeric="true"
                                class="filter-price-input" />
                        </div>
                        <div class="flex flex-col items-start justify-start gap-1 text-sm">
                            <label>Maksimum Harga</label>
                            <x-bladewind::input placeholder="Rp. 0" name="min_price" numeric="true"
                                class="filter-price-input" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 px-5">
                <div class="mb-3 flex items-center justify-start gap-1 text-primary open-filter md:hidden">
                    <x-bladewind::icon name="arrow-long-left" class="!h-5 !w-5" />
                    <span>Filter</span>
                </div>
                <h2 class=" text-xl md:text-2xl font-extrabold mb-5">Jelajahi Produk Digital</h2>
                <div class="flex items-center justify-start gap-3 w-full md:w-3/4 mb-10">
                    <div
                        class="border border-primary rounded-md bg-transparent h-10 pl-3 flex-1 flex items-center justify-start overflow-hidden">
                        <x-bladewind::icon name="magnifying-glass" type="solid"
                            class="!h-7 !w-7 md:!h-5 md:!w-5 text-amber-500" />
                        <input type="text"
                            class="border-none outline-none bg-transparent focus:outline-none text-black w-full">
                    </div>
                    <x-bladewind::button show_focus_ring="false" color="yellow" uppercasing="false" size="small"
                        class="font-bold">
                        Cari
                    </x-bladewind::button>
                </div>
                <div class="w-full">
                    <div class="w-full grid grid-cols-fit align-top justify-items-start gap-5">
                        <x-card-product></x-card-product>
                        <x-card-product></x-card-product>
                        <x-card-product></x-card-product>
                        <x-card-product></x-card-product>
                        <x-card-product></x-card-product>
                        <x-card-product></x-card-product>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                // toggle filter tipe dan kategori
                $('.open-list').on('click', function() {
                    let parent = $(this).closest('.parent-filter')
                    let list = $(this).closest('.parent-filter').find('.list-filter')
                    let isOpen = list.height() > 0


                    if (isOpen) {
                        $(this).css('transform', 'rotate(0deg)')
                        list.css('height', 0)

                    } else {
                        let height = list.get(0).scrollHeight
                        $(this).css('transform', 'rotate(180deg)')
                        list.css('height', height + 'px')
                    }
                })

                // format input harga filter
                $('.filter-price-input').on('input', function() {
                    let value = this.value

                    value = value.replaceAll('.', '')

                    let formattedValue = Intl.NumberFormat('id-ID', {
                        style: 'decimal'
                    }).format(value)

                    this.value = formattedValue
                })

                // toggle filter mobile
                $('.open-filter').on('click', function() {
                    $('.filter-field').removeClass('-left-60').addClass('left-0')
                })
                $('.close-filter').on('click', function() {
                    $('.filter-field').removeClass('left-0').addClass('-left-60')
                })
            })
        </script>
    @endpush
</x-layout>
