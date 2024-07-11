<x-layout :profileCompany="$profile_company">
    <div class="medium-container px-5 md:px-0 py-10 relative h-full">
        <div class="w-full flex items-start justify-start">
            <x-filter-browse-product :categories="$categories" :filter="$filter"></x-filter-browse-product>
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
                            class="border-none outline-none bg-transparent focus:outline-none text-black w-full"
                            id="input-search-product" value="{{ $filter['search'] }}">
                    </div>
                    <x-bladewind::button show_focus_ring="false" color="yellow" uppercasing="false" size="small"
                        class="font-bold" id="btn-search-product">
                        Cari
                    </x-bladewind::button>
                </div>
                <div class="w-full">
                    @if ($products->isEmpty())
                        <div class="w-full h-full flex items-center justify-center">
                            <x-bladewind::empty-state message="Produk digital yang anda cari tidak ditemukan"
                                image="{{ asset('vendor/bladewind/images/empty-state-old.svg') }}">
                            </x-bladewind::empty-state>
                        </div>
                    @else
                        <div class="w-full grid grid-cols-fit align-top justify-items-start justify-start gap-5 mb-5">
                            @foreach ($products as $product)
                                <x-card-product :product="$product"></x-card-product>
                            @endforeach
                        </div>
                        <div class="w-full flex items-center justify-center gap-3">
                            {{ $products->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <form action="#" method="GET" class="hidden" id="form-filter">
            <input type="hidden" name="type" class="param-type" value="{{ $filter['type'] }}">
            <input type="hidden" name="category" class="param-category" value="{{ $filter['category'] }}">
            <input type="hidden" name="minimum_price" class="param-minimum-price"
                value="{{ $filter['minimum_price'] }}">
            <input type="hidden" name="maximum_price" class="param-maximum-price"
                value="{{ $filter['maximum_price'] }}">
            <input type="hidden" name="search" class="param-search" value="{{ $filter['search'] }}">
        </form>
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

                // filter produk
                // filter searching
                $('#input-search-product').on('input', function() {
                    let value = this.value

                    $('.param-search').val(value)

                })

                $('#btn-search-product').on('click', function() {
                    $('#form-filter').submit()
                })

                // filter tipe
                $('.filter-type').on('click', function() {
                    let value = $(this).data('value')

                    $('.param-type').val(value)

                    $('#form-filter').submit()
                })

                // filter kategori
                $('.filter-category').on('click', function() {
                    let value = $(this).data('value')

                    $('.param-category').val(value)

                    $('#form-filter').submit()
                })

                // minimum price
                $('#input-minimum-price').on('input', function() {
                    let value = this.value

                    value = value.replaceAll('.', '')

                    let formatted = new Intl.NumberFormat('id-ID', {
                        style: 'decimal',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(value)

                    $('.param-minimum-price').val(value)

                    this.value = formatted
                })

                $('#input-minimum-price').on('blur', function() {
                    $('#form-filter').submit()
                })

                // maximum price
                $('#input-maximum-price').on('input', function() {
                    let value = this.value

                    value = value.replaceAll('.', '')

                    let formatted = new Intl.NumberFormat('id-ID', {
                        style: 'decimal',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(value)

                    $('.param-maximum-price').val(value)

                    this.value = formatted
                })

                $('#input-maximum-price').on('blur', function() {
                    $('#form-filter').submit()
                })

            })
        </script>
    @endpush
</x-layout>
