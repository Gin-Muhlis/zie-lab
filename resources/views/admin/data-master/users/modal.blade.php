{{-- tambah data --}}
<x-bladewind::modal backdrop_can_close="true" name="create-data" ok_button_action="saveCreateData()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Tambah Data">

    <form method="post" action="{{ route('users.store') }}" class="create-form my-5" enctype="multipart/form-data">
        @csrf
        <x-bladewind::input required="true" name="name" error_message="Nama tidak boleh kosong" label="Nama"
            value="{{ old('name') }}" />

        <x-bladewind::input required="true" name="email" type="email" error_message="Email tidak boleh kosong"
            label="Email" value="{{ old('email') }}" />

        <x-bladewind::input required="true" name="phone" type="tel" error_message="No Telepon tidak boleh kosong"
            label="No Telepon" value="{{ old('phone') }}" />

        <x-bladewind::input required="true" name="password" type="password" viewable="true"
            error_message="Password tidak boleh kosong" label="Password" value="{{ old('password') }}" />

        <x-bladewind::input type="file" name="image" required="false" label="Avatar" value="{{ old('image') }}" />
        <p class="text-xs text-red-500 italic">Rekomendasi skala gambar 1:1</p>
    </form>

    @push('scripts')
        <script>
            inputPhoneNumber = (e) => {
                const value = e.target.value
                console.log(value)
            }
            saveCreateData = () => {
                if (validateForm('.create-form')) {
                    domEl('.create-form').submit();
                } else {
                    return false;
                }
            }
        </script>
    @endpush

</x-bladewind::modal>

{{-- detail data --}}
<x-bladewind::modal backdrop_can_close="true" name="detail-data" cancel_button_label=""
    ok_button_action="closeDetailData()" size="big" title="Detail Data">

    <div class="my-3">
        <div class="mb-3">
            <x-bladewind::input disabled label="Nama" class="name-input-detail" />
        </div>
        <div class="mb-3">
            <x-bladewind::input disabled label="No Telepon" class="phone-input-detail" />
        </div>
        <div class="mb-3">
            <x-bladewind::input disabled label="Nama" class="email-input-detail" />
        </div>

        <div class="mb-3">
            <label class="mb-1 inline-block">Gambar/Avatar</label>
            <img src="" alt="Image category" class="w-16 h-16 object-cover image-detail hidden">
            <p class="no-image-detail hidden text-xs italic opacity-50">Avatar tidak tersedia</p>
        </div>

    </div>
    @push('scripts')
        <script>
            // sembunyikan icon atau text icon tidak tersedia
            function closeDetailData() {
                $('.no-image-detail').addClass('hidden')
                $('.image-detail').addClass('hidden')
            }
        </script>
    @endpush
</x-bladewind::modal>

{{-- edit data --}}
<x-bladewind::modal backdrop_can_close="true" name="update-data" ok_button_action="saveUpdateData()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Edit Data">

    <form method="post" class="update-form my-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-bladewind::input required="true" name="name" error_message="Nama kategori tidak boleh kosong"
            label="Nama kategori" class="name-input-update" />

        <x-bladewind::input required="true" name="email" type="email" error_message="Email tidak boleh kosong"
            label="Email" class="email-input-update" />

        <x-bladewind::input required="true" name="phone" type="tel" error_message="No Telepon tidak boleh kosong"
            label="No Telepon" class="phone-input-update" />

        <x-bladewind::input name="password" type="password" viewable="true" label="Password" />

        <x-bladewind::input type="file" name="image" required="false" label="Avatar Baru" />
        <p class="text-xs text-red-500 italic">Rekomendasi skala gambar 1:1</p>
    </form>

    @push('scripts')
        <script>
            saveUpdateData = () => {
                if (validateForm('.update-form')) {
                    domEl('.update-form').submit();
                } else {
                    return false;
                }
            }
        </script>
    @endpush

</x-bladewind::modal>

{{-- hapus data --}}
<x-bladewind::modal backdrop_can_close="true" name="delete-data" ok_button_action="saveDeleteData()"
    ok_button_label="Simpan" cancel_button_label="Batal" ok_button_label="Hapus" size="big" type="warning"
    title="Hapus Data">

    <form method="post" class="delete-form" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <p>Apakah kamu yakin ingin menghapus data <span class="data-delete font-bold"></span>?</p>
    </form>

    @push('scripts')
        <script>
            saveDeleteData = () => {
                if (validateForm('.delete-form')) {
                    domEl('.delete-form').submit();
                } else {
                    return false;
                }
            }
        </script>
    @endpush

</x-bladewind::modal>

{{-- import data --}}
<x-bladewind::modal backdrop_can_close="true" name="import-data" ok_button_action="saveImportData()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Import Data">

    <form method="post" action="{{ route('users.import') }}" class="import-form my-5"
        enctype="multipart/form-data">
        @csrf
        <x-bladewind::input type="file" name="file-import" required="true"
            error_message="File import tidak boleh kosong" label="File import" />
    </form>

    <p class="text-cs text-red-400 italic mb-1">Download template untuk melihat ketentuan file import</p>
    <x-bladewind::button color="green" size="small" tag="a" href="{{ route('users.template') }}">
        <div class="w-full flex items-center justify-center gap-1">
            <x-bladewind::icon name="document" class="!h-4 !w-4 text-white" />
            <span>Download Template Excel</span>
        </div>
    </x-bladewind::button>

    @push('scripts')
        <script>
            saveImportData = () => {
                if (validateForm('.import-form')) {
                    domEl('.import-form').submit();
                } else {
                    return false;
                }
            }
        </script>
    @endpush

</x-bladewind::modal>