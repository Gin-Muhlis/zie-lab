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
