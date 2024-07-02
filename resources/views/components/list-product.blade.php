<div class="w-full py-28 bg-white" >
    <div class="container px-5 md:px-0 py-28">
        <h2 class="font-lato text-3xl md:text-4xl font-extrabold mb-7">Temukan Materi yang Anda Cari</h2>
        <x-list-category></x-list-category>
        <div class="relative">
            <div class="carousel-container carousel-product overflow-x-auto flex space-x-4">
                <x-card-product></x-card-product>
                <x-card-product></x-card-product>
                <x-card-product></x-card-product>
                <x-card-product></x-card-product>
                <x-card-product></x-card-product>
                <x-card-product></x-card-product>

            </div>
            <div
                class="w-10 h-10 rounded-full bg-primary cursor-pointer text-white flex items-center justify-center absolute top-1/2 -left-5 -translate-y-1/2 z-20 prev-product">
                <x-bladewind::icon name="chevron-left" class="!h-6 !w-6" />
            </div>
            <div
                class="w-10 h-10 rounded-full bg-primary cursor-pointer text-white flex items-center justify-center absolute top-1/2 -right-5 -translate-y-1/2 z-20 next-product">
                <x-bladewind::icon name="chevron-right" class="!h-6 !w-6" />
            </div>
        </div>
    </div>
</div>

{{-- @push('scripts')
    <script>
        $(function() {
            $('.prev-product').on('click', () => {
                console.log('hallo')
                $('.carousel-product').animate({
                    scrollLeft: -100
                }, 'smooth');
            })

            $('.next-product').on('click', () => {
                console.log('hallo')
                $('.carousel-product').animate({
                    scrollLeft: 100
                }, 'smooth');
            })

        })
    </script>
@endpush --}}