<x-layout :profileCompany="$profile_company">
    <x-bladewind::notification />

    <div class="w-full relative">
        <div class="w-full h-64 bg-second-background absolute top-0 left-0 -z-10"></div>
        <div class="container h-hero flex items-center justify-center">
            <x-bladewind::notification />

            <x-bladewind::card class="w-500">

                <form method="post" action="{{ route('auth.login.check') }}" class="signin-form">
                    @csrf

                    <h1 class="mb-8 text-2xl font-bold text-center">Masuk ke Zie Lab</h1>

                    <div class="mb-5">
                        <x-bladewind::input type="email" name="email" required="true" label="Email"
                            error_message="Email tidak boleh kosong" value="{{ old('email') }}" />
                    </div>

                    <div class="mb-5">
                        <x-bladewind::input type="password" viewable="true" name="password" required="true"
                            label="Password" error_message="Password tidak boleh kosong"
                            value="{{ old('password') }}" />
                    </div>

                    <div class="mb-5">
                        <x-bladewind::checkbox label="Ingat Saya" checked="false" name="remember_token" color="yellow"
                            class="shadow-sm size-5" />
                    </div>

                    <div class="text-center">
                        <x-bladewind::button name="btn-save" color="yellow" uppercasing="false" can_submit="true"
                            class="font-bold w-full" has_spinner="true">
                            Masuk
                        </x-bladewind::button>
                    </div>

                </form>

            </x-bladewind::card>

        </div>

    </div>

    @if (session('success'))
        @push('scripts')
            <script>
                showNotification('Register Berhasil', '{{ session('success') }}', 'success');
            </script>
        @endpush
    @endif

    @error('auth')
        @push('scripts')
            <script>
                showNotification('Login Gagal!', '{{ $message }}', 'error');
            </script>
        @endpush
    @enderror

    @push('scripts')
        <script>
            dom_el('.signin-form').addEventListener('submit', function(e) {
                e.preventDefault();
                signUp();
            });

            signUp = () => {
                if (validateForm('.signin-form')) {
                    unhide('.btn-save .bw-spinner')
                    dom_el('.signin-form').submit()
                } else {
                    hide('.btn-save .bw-spinner');
                }
            }
        </script>
    @endpush
</x-layout>
