@php
    use App\Services\Helper;
@endphp

<a href="{{ route('products.detail') }}">
    <div class="bg-white w-56 h-80 border rounded-lg overflow-hidden relative bg-cover bg-center flex-shrink-0"
        style="background-image: url('{{ $product->thumbnail ? Storage::url($product->thumbnail) : asset('/images/dummy/thumbnail-product.jpg') }}')">
        <div
            class="bg-primary rounded-md flex items-center justify-center px-3 py-1 text-xs text-white text-center absolute top-3 right-3 z-10">
            {{ $product->category->name }}</div>


        <div class="bg-white rounded-md p-3 z-10 absolute bottom-5 left-1/2 -translate-x-1/2 w-11/12 h-28">
            <h5 class="text-md font-bold mb-2 leading-5">{{ Helper::cutTitleProductCard($product->title, 7) }}</h5>
            <p class="text-xs text-slate-400 mb-2">Oleh {{ $product->author->name }}</p>
            <p class="text-sm font-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
    </div>
</a>
