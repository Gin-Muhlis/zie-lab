{{-- crop image --}}
<x-bladewind::modal backdrop_can_close="false" blur_size="none" name="crop-image" cancel_button_label="" size="large"
    title="Crop Gambar">
    <div class="my-3">
        <img id="image">
    </div>
</x-bladewind::modal>

{{-- hapus data e-course --}}
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

{{-- tambah section --}}
<x-bladewind::modal backdrop_can_close="true" name="create-data-section" ok_button_action="saveCreateDataSection()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Tambah Bagian">

    <form method="post" action="{{ route('sections.store') }}" class="create-form-section my-5">
        @csrf
        <x-bladewind::input required="true" name="name" error_message="Nama Bagian tidak boleh kosong"
            label="Nama Bagian" selected_value="{{ old('name') }}" />
        <input type="hidden" name="product_id" value="{{ $data->id }}">
    </form>

    @push('scripts')
        <script>
            saveCreateDataSection = () => {
                if (validateForm('.create-form-section')) {
                    domEl('.create-form-section').submit();
                } else {
                    return false;
                }
            }
        </script>
    @endpush

</x-bladewind::modal>

{{-- edit section --}}
<x-bladewind::modal backdrop_can_close="true" name="update-data-section" ok_button_action="saveUpdateDataSection()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Edit Bagian">

    <form method="post" class="update-form-section my-5">
        @csrf
        @method('PUT')
        <x-bladewind::input required="true" name="name" error_message="Nama Bagian tidak boleh kosong"
            label="Nama Bagian" selected_value="{{ old('name') }}" class="input-update-name-section" />
        <input type="hidden" name="product_id" value="{{ $data->id }}">
    </form>

    @push('scripts')
        <script>
            saveUpdateDataSection = () => {
                if (validateForm('.update-form-section')) {
                    domEl('.update-form-section').submit();
                } else {
                    return false;
                }
            }
        </script>
    @endpush

</x-bladewind::modal>
