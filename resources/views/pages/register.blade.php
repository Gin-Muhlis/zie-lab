<x-layout :profileCompany="$profile_company">
    <div class="w-full relative">
        <div class="w-full h-64 bg-second-background absolute top-0 left-0 -z-10"></div>
        <div class="container h-hero flex items-center justify-center">

            <x-bladewind::card class="w-500">

                <form method="POST" action="{{ route('auth.register.check') }}" class="signup-form">
                    @csrf

                    <h1 class="mb-8 text-2xl font-bold text-center">Bergabung dengan Zie Lab</h1>

                    <div class="mb-5">
                        <x-bladewind::input name="name" required="true" label="Nama Lengkap"
                            error_message="Nama lengkap tidak boleh kosong" value="{{ old('name') }}" />
                    </div>

                    <div class="mb-5">
                        <x-bladewind::input type="email" name="email" required="true" label="Email"
                            error_message="Email tidak boleh kosong" value="{{ old('email') }}"  />
                    </div>

                    <div class="mb-5">
                        <x-bladewind::input name="phone" required="true" label="No Telepon"
                            error_message="No telepon tidak boleh kosong" value="{{ old('phone') }}"  />
                    </div>


                    <div class="mb-5">
                        <x-bladewind::input type="password" viewable="true" name="password" required="true"
                            label="Password" error_message="Password tidak boleh kosong" value="{{ old('password') }}"  />
                    </div>


                    <div class="text-center">
                        <x-bladewind::button name="btn-save" color="yellow" uppercasing="false" can_submit="true"
                            class="font-bold w-full" has_spinner="true">
                            Daftar
                        </x-bladewind::button>
                    </div>

                </form>

            </x-bladewind::card>

        </div>

    </div>
    
    @error ('register')
        @push('scripts')
            <script>
                showNotification('Register Gagal!', '{{ $message }}', 'error');
            </script>
        @endpush
    @enderror

    @push('scripts')
        <script>
            dom_el('.signup-form').addEventListener('submit', function(e) {
                e.preventDefault();
                signUp();
            });

            signUp = () => {
                if (validateForm('.signup-form')) {
                    unhide('.btn-save .bw-spinner')
                    dom_el('.signup-form').submit()
                } else {
                    hide('.btn-save .bw-spinner');
                }
            }
        </script>
    @endpush
</x-layout>
