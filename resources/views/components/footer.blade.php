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
                            <a href="#about">E-Book</a>
                        </li>
                        <li class="mb-2">
                            <a href="#category">E-Course</a>
                        </li>
                        <li>
                            <a href="#product">E-File</a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col items-start justify-start gap-3">
                    <h5 class="text-white text-lg">Hubungi Kami</h5>
                    <ul class="text-slate-200 text-xs">
                        <li class="mb-2">
                            <a href="#about">{{ $profileCompany->phone }}</a>
                        </li>
                        <li class="mb-2">
                            <a href="#category">{{ $profileCompany->email }}</a>
                        </li>
                        <li>
                            <a href="#product">{{ $profileCompany->address }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       <p class="text-slate-200 pb-5 text-sm">&#169; 2024 {{ $profileCompany->title }} - All right reserved</p>
    </div>
</footer>
