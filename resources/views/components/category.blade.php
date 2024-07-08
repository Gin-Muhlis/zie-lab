<div class="container px-5 md:px-0 py-28" id="categories">
    <h2 class="text-center text-3xl md:text-4xl font-extrabold mb-10">Daftar Kategori</h2>
    <div class="flex flex-wrap justify-center items-start gap-8">
        @foreach ($categories as $category)
            <x-card-category :category="$category"></x-card-category>
        @endforeach
    </div>
</div>