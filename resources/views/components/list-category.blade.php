<div class="carousel-container overflow-x-auto flex space-x-4 mb-7">
    @foreach ($categories as $category)
    <a href="/?category={{ $category->id }}#products" class="carousel-item flex-shrink-0 px-5 py-3 text-sm {{ $filterCategory == $category->id ? 'bg-black text-white' : 'border border-black text-black' }} rounded-full shadow-sm hover:text-white hover:bg-black cursor-pointer transition-all duration-300 category-list-product" data-category="{{ $category->id }}">{{ $category->name }}</a>
    @endforeach
</div>