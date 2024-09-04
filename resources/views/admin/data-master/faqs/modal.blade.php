{{-- tambah data --}}
<x-bladewind::modal backdrop_can_close="true" name="create-data" ok_button_action="saveCreateData()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Tambah Data">

    <form method="post" action="{{ route('faqs.store') }}" class="create-form my-5" enctype="multipart/form-data">
        @csrf
        <x-bladewind::input required="true" name="question" error_message="Pertanyaan tidak boleh kosong"
            label="Pertanyaan" value="{{ old('question') }}" />

        <x-bladewind::textarea name="answer" required="true" label="Jawaban" rows="5"
            error_message="Jawaban tidak boleh kosong" selected_value="{{ old('answer') }}" />
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
<x-bladewind::modal backdrop_can_close="true" name="detail-data" cancel_button_label="" size="big"
    title="Detail Data">

    <div class="my-3">
        <div class="mb-3">
            <x-bladewind::input disabled label="Pertanyaan" class="question-input-detail" />
        </div>
        <div class="mb-3">
            <x-bladewind::textarea disabled label="Jawaban" rows="5" class="answer-input-detail" />
        </div>
    </div>
</x-bladewind::modal>

{{-- edit data --}}
<x-bladewind::modal backdrop_can_close="true" name="update-data" ok_button_action="saveUpdateData()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="big" title="Edit Data">

    <form method="post" class="update-form my-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-bladewind::input required="true" name="question" error_message="Pertanyaan tidak boleh kosong"
        label="Pertanyaan" class="question-input-update" />

    <x-bladewind::textarea name="answer" required="true" label="Jawaban" rows="5"
        error_message="Jawaban tidak boleh kosong" class="answer-input-update" />
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
        <p>Apakah kamu yakin ingin menghapus data <span class="font-bold">"<span class="data-delete"></span>"</span>?</p>
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

    <form method="post" action="{{ route('faqs.import') }}" class="import-form my-5"
        enctype="multipart/form-data">
        @csrf
        <x-bladewind::input type="file" name="file-import" required="true"
            error_message="File import tidak boleh kosong" label="File import" />
    </form>

    <p class="text-cs text-red-400 italic mb-1">Download template untuk melihat ketentuan file import</p>
    <x-bladewind::button color="green" size="small" tag="a" href="{{ route('faqs.template') }}">
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
