<div class="carousel-container overflow-x-auto flex space-x-4 mb-7">
    @foreach ($categories as $category)
    <div class="carousel-item flex-shrink-0 px-5 py-3 text-sm bg-black text-white rounded-full shadow-sm hover:shadow-lg cursor-pointer transition-all duration-300 category-list-product">{{ $category->name }}</div>
    @endforeach
</div>