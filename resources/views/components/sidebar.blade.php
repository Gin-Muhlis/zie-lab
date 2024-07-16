<div
    class="w-56 px-4 py-8 bg-gradient-to-br from-primary to-yellow-400 fixed top-0 -left-56 transition-all duration-500 h-screen z-40 overflow-y-scroll md:w-64 md:left-0 sidebar">

    <div
        class="w-5 h-5 rounded-full bg-second-background flex items-center justify-center absolute right-2 top-2 close-sidebar md:hidden">
        <x-bladewind::icon name="x-mark" class="!h-3 !w-3 text-white cursor-pointer open-sidebar" />
    </div>

    <div class="w-full mb-8 pb-5 border-b-4 border-b-white flex items-center justify-start gap-3 flex-wrap">
        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-center text-primary font-bold">
            ZL
        </div>
        <h1 class="text-xl text-white font-bold">Zie Lab</h1>
    </div>
    <div class="w-full flex flex-col items-start justify-start gap-5">
        {{-- dsahboard admin --}}
        <a href="{{ route('dashboard.admin') }}"
            class="w-full p-2 px-3 rounded text-second-background bg-white font-semibold text-sm">Dashboard</a>

        {{-- data master admin --}}
        <div class="w-full p-2 rounded text-white text-sm font-medium dropdown">
            <div class="w-full flex items-center justify-between">
                <span class="dropdown-toggle cursor-pointer">Data Master</span>
                <x-bladewind::icon name="chevron-down"
                    class="!h-5 !w-5 text-white dropdown-toggle dropdown-icon transition-all duration-500 cursor-pointer" />
            </div>
            <div
                class="w-full h-0 overflow-hidden transition-all duration-500 ml-2 flex flex-col items-start justify-start gap-2 dropdown-menu p-0">
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    Kategori
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    Biodata Perusahaan
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    FAQ
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    User
                </a>
            </div>
        </div>

        {{-- daftar produk admin --}}
        <div class="w-full p-2 rounded text-white text-sm font-medium dropdown">
            <div class="w-full flex items-center justify-between">
                <span class="dropdown-toggle cursor-pointer">Produk</span>
                <x-bladewind::icon name="chevron-down"
                    class="!h-5 !w-5 text-white dropdown-toggle dropdown-icon transition-all duration-500 cursor-pointer" />
            </div>
            <div
                class="w-full h-0 overflow-hidden transition-all duration-500 ml-2 flex flex-col items-start justify-start gap-2 dropdown-menu">
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    E-Book
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    E-Course
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    E-File
                </a>
            </div>
        </div>

        {{-- fitur admin --}}
        <div class="w-full p-2 rounded text-white text-sm font-medium dropdown">
            <div class="w-full flex items-center justify-between">
                <span class="dropdown-toggle cursor-pointer">Fitur</span>
                <x-bladewind::icon name="chevron-down"
                    class="!h-5 !w-5 text-white dropdown-toggle dropdown-icon transition-all duration-500 cursor-pointer" />
            </div>
            <div
                class="w-full h-0 overflow-hidden transition-all duration-500 ml-2 flex flex-col items-start justify-start gap-2 dropdown-menu">
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    Custom Halaman
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    Transaksi
                </a>
            </div>
        </div>

        {{-- laporan admin --}}
        <div class="w-full p-2 rounded text-white text-sm font-medium dropdown">
            <div class="w-full flex items-center justify-between">
                <span class="dropdown-toggle cursor-pointer">Laporan</span>
                <x-bladewind::icon name="chevron-down"
                    class="!h-5 !w-5 text-white dropdown-toggle dropdown-icon transition-all duration-500 cursor-pointer" />
            </div>
            <div
                class="w-full h-0 overflow-hidden transition-all duration-500 ml-2 flex flex-col items-start justify-start gap-2 dropdown-menu">
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    Transaksi
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    Produk
                </a>
                <a href="{{ route('dashboard.admin') }}"
                    class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
                    User
                </a>
            </div>
        </div>

        {{-- menu user --}}
        {{-- <a href="{{ route('dashboard.admin') }}" class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
            Dashboard
        </a>
        <a href="{{ route('dashboard.admin') }}" class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
            Produk Saya
        </a>
        <a href="{{ route('dashboard.admin') }}" class="w-full p-2 rounded text-slate-100 text-sm font-medium block">
            Biodata
        </a> --}}

        {{-- logout --}}
        <div class="w-full mt-5">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf

                <button
                    class="w-full p-3 rounded text-white bg-second-background text-sm text-start flex items-center justify-start gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>

                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(function() {
            $('.dropdown-toggle').on('click', function() {
                let dropdownMenu = $(this).closest('.dropdown').find('.dropdown-menu')
                let dropdownIcon = $(this).closest('.dropdown').find('.dropdown-icon')
                let isOpen = dropdownMenu.height() > 0
                console.log(dropdownMenu)

                if (isOpen) {
                    dropdownMenu.css('height', 0)
                    dropdownMenu.css('margin-top', '0')

                    $(dropdownIcon).css('transform', 'rotate(0deg)')
                } else {
                    let height = dropdownMenu.get(0).scrollHeight
                    dropdownMenu.css('height', `${height}px`)
                    dropdownMenu.css('margin-top', '20px')

                    $(dropdownIcon).css('transform', 'rotate(180deg)')
                }
            })
        })
    </script>
@endpush
