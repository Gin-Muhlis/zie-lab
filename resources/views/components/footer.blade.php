<footer class=" bg-second-background h-full">
    <div class="container px-5 md:px-0">
        <div class="w-full py-8 border-b-2 border-white mb-5">
            <div class="w-full grid grid-cols-fit align-top justify-between gap-5">
                <div class="flex flex-col items-start justify-start gap-2">
                    <img src="{{ $profileCompany->icon ? Storage::url($profileCompany->icon) : asset('images/logo.ong') }}" alt="Logo Zie Lab">
                    <p class="text-slate-200 text-xs">
                       {{ $profileCompany->about }}
                    </p>
                </div>
                <div class="flex flex-col items-start justify-start gap-3">
                    <h5 class="text-white text-lg">Menu</h5>
                    <ul class="text-slate-200 text-xs">
                        <li class="mb-2">
                            <a href="/#about">About</a>
                        </li>
                        <li class="mb-2">
                            <a href="/#categories">Kategori</a>
                        </li>
                        <li class="mb-2">
                            <a href="/#products">Produk Digital</a>
                        </li>
                        <li>
                            <a href="/#faqs">FAQ</a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col items-start justify-start gap-3">
                    <h5 class="text-white text-lg">Tipe Produk Digital</h5>
                    <ul class="text-slate-200 text-xs">
                        <li class="mb-2">
                            <a href="/products/browse?type=E-Book">E-Book</a>
                        </li>
                        <li class="mb-2">
                            <a href="/products/browse?type=E-Course">E-Course</a>
                        </li>
                        <li>
                            <a href="/products/browse?type=E-File">E-File</a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col items-start justify-start gap-3">
                    <h5 class="text-white text-lg">Hubungi Kami</h5>
                    <ul class="text-slate-200 text-xs">
                        <li class="mb-2">
                            <a  href="https://wa.me/{{ $profileCompany->phone ?? '' }}?text={{ urlencode('Hallo ' . $profileCompany->title ?? '' . '. Saya ingin bertanya mengenai ...') }}">{{ $profileCompany->phone ?? '' }}</a>
                        </li>
                        <li class="mb-2">
                            <a href="mailto:{{ $profileCompany->email ?? '' }}?subject=Tentang20%{{ $profileCompany->title ?? '' }}&body=Saya%20ingin%bertanya%20tentang%20..." target="_blank">{{ $profileCompany->email ?? '' }}</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/maps?q={{ $profileCompany->address ?? '' }}" target="_blank">{{ $profileCompany->address ?? '' }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       <p class="text-slate-200 pb-5 text-xs">&#169; 2024 {{ $profileCompany->title ?? '' }} - All right reserved</p>
    </div>
</footer>
