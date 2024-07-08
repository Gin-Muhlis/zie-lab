<div class="container px-5 py-28" id="about">
    <div class="flex items-center justify-between gap-10 flex-col md:flex-row mb-28">
        <div>
            <h2 class="color-primary text-3xl md:text-4xl mb-5 text-primary font-bold">
                {{ $profileCompany->title ?? '' }}
            </h2>
            <p class="text-md leading-8 w-full">
                {{ $profileCompany->about ?? '' }}
            </p>
        </div>
        <img src="{{ asset('images/about-image-1.jpg') }}" alt="About image" class="w-11/12 md:w-4/12 rounded-md shadow-sm">
    </div>
    <div class="flex items-center justify-between gap-10 flex-col-reverse md:flex-row">
        <img src="{{ asset('images/about-image-2.jpg') }}" alt="About image" class="w-11/12 md:w-4/12 rounded-md shadow-sm">
        <div>
            <h2 class="color-primary text-3xl md:text-4xl mb-5 text-black font-bold italic">
                Belajar Tanpa Batas
            </h2>
            <p class="text-md leading-8 w-full">
                Teruslah belajar dan bergabunglah dengan komunitas pelajar di Zie Lab. Temukan semua yang Anda butuhkan untuk mengembangkan pengetahuan dan keterampilan Anda.
            </p>
        </div>
    </div>
</div>