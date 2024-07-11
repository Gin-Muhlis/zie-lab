@php
    $default_class = 'text-second-background bg-transparent hover:bg-second-background hover:text-white';
    $selected_class = 'text-white bg-second-background hover:border hover:border-second-background hover:text-second-background';
@endphp

<div
    class="w-60 bg-white border absolute -left-60 top-0 px-5 h-full z-20 filter-field transition-all duration-500 md:relative md:-left-0 md:bg-transparent">
    <div
        class="w-6 h-6 rounded-full bg-second-background flex items-center justify-center absolute right-2 top-2 text-white close-filter md:hidden">
        <x-bladewind::icon name="x-mark" class="!h-4 !w-4 cursor-pointer open-list transition-all duration-500" />
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
            <div class="w-full p-2 rounded-md cursor-pointer text-sm transition-all duration-500 {{ $filter['type'] == 'E-Book' ? $selected_class : $default_class }} filter-type" data-value="E-Book">
                E-Book
            </div>
            <div class="w-full p-2 rounded-md cursor-pointer text-sm transition-all duration-500 {{ $filter['type'] == 'E-Course' ? $selected_class : $default_class }} filter-type" data-value="E-Course">
                E-Course
            </div>
            <div class="w-full p-2 rounded-md cursor-pointer text-sm transition-all duration-500 {{ $filter['type'] == 'E-File' ? $selected_class : $default_class }} filter-type" data-value="E-File">
                E-File
            </div>
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
            @foreach ($categories as $category)
                <div class="w-full p-2 rounded-md cursor-pointer text-sm transition-all duration-500 {{ $filter['category'] == $category->id ? $selected_class : $default_class }} filter-category" data-value="{{ $category->id }}">
                    {{ $category->name }}
                </div>
            @endforeach
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
                <x-bladewind::input placeholder="Rp. 0" name="min_price" numeric="true" class="filter-price" id="input-minimum-price" value="{{ number_format($filter['minimum_price'], 0, ',', '.') }}" />
            </div>
            <div class="flex flex-col items-start justify-start gap-1 text-sm">
                <label>Maksimum Harga</label>
                <x-bladewind::input placeholder="Rp. 0" name="min_price" numeric="true" class="filter-price" id="input-maximum-price" value="{{ number_format($filter['maximum_price'], 0, ',', '.') }}" />
            </div>
        </div>
    </div>
    
</div>
