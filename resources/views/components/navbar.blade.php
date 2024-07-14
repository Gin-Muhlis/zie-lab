<div class="w-full px-5 sm:px-8 bg-second-background h-20 flex items-center justify-between drop-shadow-down gap-5 z-50">
    <a href="/">
        <img src="{{ $profileCompany->icon ? Storage::url($profileCompany->icon) : asset('images/logo.ong') }}"
            alt="Logo Zie Lab" class="w-24 sm:w-auto">
    </a>
    <div class="flex items-center flex-1 justify-end gap-2 sm:gap-5">
        @if (Auth::check())
            @if (Auth::user()->isSuperAdmin())
                <x-bladewind::button show_focus_ring="false" color="yellow" outline="true" uppercasing="false"
                    size="small" class="font-bold" tag="a" href="{{ route('dashboard.admin') }}">
                    <div class="flex items-center justify-center gap-1">
                        <x-bladewind::icon name="home" class="!h-4 !w-4 text-primary" />
                        <span>Dashboard</span>
                    </div>
                </x-bladewind::button>
            @else
                <x-bladewind::button show_focus_ring="false" color="yellow" outline="true" uppercasing="false"
                    size="small" class="font-bold" tag="a" href="{{ route('dashboard.user') }}">
                    <div class="flex items-center justify-center gap-1">
                        <x-bladewind::icon name="home" class="!h-4 !w-4 text-primary" />
                        <span>Dashboard</span>
                    </div>
                </x-bladewind::button>
            @endif
        @else
            <x-bladewind::button show_focus_ring="false" color="yellow" outline="true" uppercasing="false"
                size="small" class="font-bold" tag="a" href="{{ route('auth.login.page') }}">
                Masuk
            </x-bladewind::button>
            <x-bladewind::button show_focus_ring="false" color="yellow" uppercasing="false" size="small"
                class="font-bold" tag="a" href="{{ route('auth.register.page') }}">
                Mulai Bergabung
            </x-bladewind::button>
        @endif
    </div>
</div>
