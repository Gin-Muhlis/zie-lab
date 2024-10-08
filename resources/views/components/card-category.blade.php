<div class="rounded-md overflow-hidden bg-white w-64 h-full shadow-lg">
    <div class="w-full h-48 bg-second-background flex items-center justify-center">
        <img src="{{ $category->icon ? Storage::url($category->icon) : asset('/images/dummy/category-icon.png') }}" alt="Category icon">
    </div>
    <div class="w-full p-4">
        <h5 class="text-lato text-black font-bold mb-1 text-lg">{{ $category->name }}</h5>
        <span class="text-inter text-md text-slate-400 italic text-sm">{{ count($category->products) }} Produk Digital</span>
    </div>
</div>
