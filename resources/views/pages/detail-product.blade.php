@php
    use App\Services\Helper;
@endphp

<x-layout :profileCompany="$profile_company">
    <div class="medium-container px-5 md:px-0 py-10 relative">
        <div class="w-full flex flex-col items-center justify-start gap-5">
            <div class="max-w-500 w-100 h-600 p-5 flex items-end justify-center rounded-md shadow-md bg-cover bg-center"
                style="background-image: url('{{ asset('/images/dummy/thumbnail-product.jpg') }}');">
                <div class="w-full bg-white rounded-sm p-5">
                    <h1 class="text-2xl font-bold mb-3 leading-7">{{ $product->title ?? '' }}</h1>
                    <div class="w-full flex items-center justify-start gap-2 mb-4">
                        <div class="px-3 py-1 rounded bg-secondary text-white text-xs">
                            {{ $product->type ?? '' }}
                        </div>
                        <div class="px-3 py-1 rounded bg-primary text-white text-xs">
                            {{ $product->category->name ?? '' }}
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 mb-4">Diterbitkan Oleh</p>
                    <div class="flex items-center justify-start gap-2 mb-4">
                        @if ($product->author->image)
                            <img src="{{ Storage::url($product->author->image) }}" alt="Avatar image"
                                class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div
                                class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">
                                {{ Helper::getInitialName($product->author->name) }}
                            </div>
                        @endif
                        <span class="font-bold">{{ $product->author->name ?? '' }}</span>
                    </div>
                    <p class="text-md font-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="w-full rounded-md bg-white p-5 md:p-10">
                <div class="w-full rounded-md bg-second-background p-5 md:p-8 mb-10">
                    <h2 class="text-xl text-primary font-bold mb-8">Apa Yang Akan Kamu Dapatkan</h2>
                    <ul>
                        @foreach ($product->benefits as $benefit)
                            <li class="flex items-center justify-start text-md text-white gap-1 mb-4">
                                <x-bladewind::icon name="check" class="!h-6 !w-6" />
                                <span>{{ $benefit->benefit }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-10">
                    <h2 class="text-xl text-primary font-bold mb-3">Deskripsi</h2>
                    <p class=text-sm text-second-background leading-7 md:text-base">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="mb-10">
                    <h2 class="text-xl text-primary font-bold mb-3">Pelajaran</h2>
                    <div class="flex flex-col items-start justify-start gap-5">
                        @foreach ($product->sections as $section)
                            <div class="w-full">
                                <h3 class="text-base text-slate-500 font-bold mb-2">{{ $section->name }}</h3>
                                <div class="flex flex-col items-start justify-start gap-3 w-full ps-3">
                                    @foreach ($section->lessons as $lesson)
                                        @if ((bool) $lesson->is_preview)
                                            <a href="#"
                                                class="w-full p-4 rounded border border-slate-300 flex items-center jusitfy-start gap-2 text-primary text-sm">
                                                <x-bladewind::icon name="document-text" class="!h-5 !w-5" />
                                                <span>{{ $lesson->title }}</span>
                                            </a>
                                        @else
                                            <div
                                                class="w-full p-4 rounded border border-slate-300 opacity-70 flex items-center jusitfy-start gap-2 text-second-background text-sm">
                                                <x-bladewind::icon name="document-text" class="!h-5 !w-5" />
                                                <span>{{ $lesson->title }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        @endforeach



                    </div>
                </div>
                <x-bladewind::button show_focus_ring="false" color="yellow" uppercasing="false"
                    class="font-bold w-full text-lg text-center" tag="a" href="{{ route('products.payment', $product->code) }}">
                    Beli Rp. {{ number_format($product->price, 0, ',', '.') }}
                </x-bladewind::button>
            </div>
        </div>
    </div>
</x-layout>
