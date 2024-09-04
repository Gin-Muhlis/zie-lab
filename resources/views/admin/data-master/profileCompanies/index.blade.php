<x-layout-panel>
    <div class="w-full">
        <h1 class="text-2xl font-bold mb-5">Biodata Perusahaan</h1>
        <x-bladewind::card class="w-full relative overflow-x-auto">
            <div class="w-full flex t1ems-center justify-start flex-wrap gap-5 mb-10">
                <x-bladewind::button onclick="saveUpdateData()" color="yellow">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="pencil" class="!h-4 !w-4 text-white" />
                        <span>Edit Data</span>
                    </div>
                </x-bladewind::button>
                <x-bladewind::button color="green" tag="a" href="{{ route('profile-companies.export') }}">
                    <div class="w-full flex items-center justify-center gap-1">
                        <x-bladewind::icon name="document" class="!h-4 !w-4 text-white" />
                        <span>Export Data</span>
                    </div>
                </x-bladewind::button>
            </div>

            <form method="post" action="{{ route('profile-companies.update', $data->id) }}" class="update-form w-full flex flex-col items-start justify-start gap-5"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full flex items-start justify-start gap-5">
                    <x-bladewind::input name="title" required="true" value="{{ $data->title }}" label="Nama"  error_message="Nama tidak boleh kosong"  />
                    <x-bladewind::input name="phone" required="true" value="{{ $data->phone }}" label="No Telepon" error_message="No telepon tidak boleh kosong" />
                </div>
                <div class="w-full flex items-start justify-start gap-5">
                    <x-bladewind::input name="email" required="true" value="{{ $data->email }}" label="Email" error_message="Email tidak boleh kosong" label="Email" />
                    <x-bladewind::input name="address" required="true" value="{{ $data->address }}" label="Alamat" error_message="Alamat tidak boleh kosong" />
                </div>
                <div class="w-full flex items-start justify-start gap-5">
                    <x-bladewind::textarea name="about" required="true" label="Deskripsi" selected_value="{{ $data->about }}" rows="5" error_message="Deskripsi tidak boleh kosong" />
                </div>
                <div class="w-full flex items-start justify-start gap-5 -translate-y-3">
                    <div class="flex flex-col items-start justify-start gap-3">
                        <label class="text-xs text-gray-400">Logo</label>
                        <img src="{{ Storage::url($data->icon) }}" alt="Logo" class="icon-data mb-4 w-32 h-10 object-cover">
                        
                        <div>
                            <x-bladewind::input type="file" name="icon" required="false" label="Logo Baru" class="icon-input" />
                        <p class="text-red italic text-sm text-red-300">
                            Skala gambar harus 3:1
                        </p>
                        </div>
                        
                    </div>
                </div>
            </form>
        </x-bladewind::card>

        @push('scripts')
            <script>
                $('.icon-input').on('change', (e) => {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = (e) => {
                        const img = $('.icon-data');
                   
                        $(img).attr('src', e.target.result)
                    }
                    if (file) {
                        reader.readAsDataURL(file);
                    }
                })

                saveUpdateData = () => {
                    if (validateForm('.update-form')) {
                        domEl('.update-form').submit();
                    } else {
                        return false;
                    }
                }
            </script>
        @endpush
</x-layout-panel>
