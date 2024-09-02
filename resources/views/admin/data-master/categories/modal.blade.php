{{-- tambah data --}}
<x-bladewind::modal backdrop_can_close="true" name="create-data" ok_button_action="saveCreateData()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Tambah Data">

    <form method="post" action="{{ route('categories.store') }}" class="create-form my-5" enctype="multipart/form-data">
        @csrf
        <x-bladewind::input required="true" name="name" error_message="Nama kategori tidak boleh kosong"
            label="Nama kategori" value="{{ old('name') }}" />

        <x-bladewind::input type="file" name="icon" required="true" error_message="Icon tidak boleh kosong"
            label="Icon" value="{{ old('icon') }}" />
    </form>

    @push('scripts')
        <script>
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
            <label class="mb-1 inline-block">Nama</label>
            <x-bladewind::input disabled value="Crypto" class="input-detail" />
        </div>

        <div class="mb-3">
            <label class="mb-1 inline-block">Icon</label>
            <img src="" alt="Image category" class="w-7 h-7 object-cover image-detail hidden">
            <p class="no-image-detail hidden text-xs italic opacity-50">Icon tidak tersedia</p>
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
            label="Nama kategori" class="input-update" />

        <x-bladewind::input type="file" name="icon" required="false" label="Icon baru" />
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
