{{-- tambah data --}}
<x-bladewind::modal backdrop_can_close="true" name="create-data" ok_button_action="saveCreateData()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Tambah Data">

    <form method="post" action="{{ route('categories.store') }}" class="create-form my-5" enctype="multipart/form-data">
        @csrf
        <x-bladewind::input required="true" name="name" error_message="Nama kategori tidak boleh kosong"
            label="Nama kategori" value="{{ old('name') }}" />

        <div class="image-preview mb-5">
            <div class="blank-image-create w-10 h-10 bg-gray-300 rounded"></div>
            <img src="" alt="image-preview" class="image-preview-create w-10 h-10 object-cover hidden">
        </div>
        <x-bladewind::input type="file" name="icon" required="true" error_message="Icon tidak boleh kosong"
            label="Icon" value="{{ old('icon') }}" class="image-input-create" />
    </form>

    @push('scripts')
        <script>
            $('.image-input-create').on('change', e => {
                let file = e.target.files[0]
                let reader = new FileReader()

                reader.onload = (e) => {
                    $('.blank-image-create').addClass('hidden')
                    const img = $('.image-preview-create');
                    $(img).removeClass('hidden')

                    $(img).attr('src', e.target.result)
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            })
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
            <x-bladewind::input disabled label="Nama" class="input-detail" />
        </div>

        <div class="mb-3">
            <label class="mb-1 inline-block">Icon</label>
            <img src="" alt="Image category" class="w-10 h-10 object-cover image-detail hidden">
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
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Edit Data" backdrop_can_close="false" cancel_button_action="cancelUpdateData()">

    <form method="post" class="update-form my-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-bladewind::input required="true" name="name" error_message="Nama kategori tidak boleh kosong"
            label="Nama kategori" class="input-update" />

        <div class="image-preview mb-5">
            <div class="blank-image-update w-10 h-10 bg-gray-300 rounded hidden"></div>
            <img src="" alt="image-preview" class="image-preview-update w-10 h-10 object-cover hidden">
        </div>
        <x-bladewind::input type="file" name="icon" required="false" label="Icon baru" class="image-input-update" />
    </form>

    @push('scripts')
        <script>
            $('.image-input-update').on('change', e => {
                let file = e.target.files[0]
                let reader = new FileReader()

                reader.onload = (e) => {
                    $('.blank-image-update').addClass('hidden')
                    const img = $('.image-preview-update');
                    $(img).removeClass('hidden')

                    $(img).attr('src', e.target.result)
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            })

            cancelUpdateData = () => {
                $('.blank-image-update').addClass('hidden')
                $('.image-preview-update').addClass('hidden')
                $('.image-preview-update').attr('src', '')
            }

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

    <form method="post" action="{{ route('categories.import') }}" class="import-form my-5"
        enctype="multipart/form-data">
        @csrf
        <x-bladewind::input type="file" name="file-import" required="true"
            error_message="File import tidak boleh kosong" label="File import" />
    </form>

    <p class="text-cs text-red-400 italic mb-1">Download template untuk melihat ketentuan file import</p>
    <x-bladewind::button color="green" size="small" tag="a" href="{{ route('categories.template') }}">
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
