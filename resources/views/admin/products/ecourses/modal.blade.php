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


{{-- hapus data --}}
<x-bladewind::modal backdrop_can_close="true" name="delete-data-section" ok_button_action="saveDeleteDataSection()"
    ok_button_label="Simpan" cancel_button_label="Batal" ok_button_label="Hapus" size="big" type="warning"
    title="Hapus Data">

    <form method="post" class="delete-form-section" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <p>Apakah kamu yakin ingin menghapus data <span class="data-delete-section font-bold"></span>?</p>
    </form>

    @push('scripts')
        <script>
            saveDeleteDataSection = () => {
                if (validateForm('.delete-form-section')) {
                    domEl('.delete-form-section').submit();
                } else {
                    return false;
                }
            }
        </script>
    @endpush

</x-bladewind::modal>

{{-- ubah urutan section --}}
<form method="post" action="{{ route('sections.order.change', $data->id) }}" class="change-order-form-section"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="old_order" class="old-order-section-input">
    <input type="hidden" name="new_order" class="new-order-section-input">
</form>

{{-- tambah lesson --}}
<x-bladewind::modal backdrop_can_close="true" name="create-data-lesson" ok_button_action="saveCreateDataLesson()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="xl" title="Tambah Materi">

    <form method="post" action="{{ route('lessons.store') }}" class="create-form-lesson my-5">
        @csrf
        <x-bladewind::input required="true" name="title" error_message="Judul tidak boleh kosong" label="Judul"
            selected_value="{{ old('title') }}" />
        <x-bladewind::textarea placeholder="Konten" name="content_toolbar" toolbar="true" except="image"
            required="true"></x-bladewind::textarea>
        <x-bladewind::input required="true" name="video_url" error_message="Url Video tidak boleh kosong"
            label="URL Video" selected_value="{{ old('video_url') }}" />
        <input type="hidden" name="section_id" class="id-section-lesson-input">
        <textarea name="content" id="content" class="hidden"></textarea>

    </form>

    @if (old('description'))
        <script>
            document.querySelector('.ql-editor').innerHTML = `{!! old('description') !!}`;
        </script>
    @endif

    @push('scripts')
        <script>
            saveCreateDataLesson = () => {
                if (validateForm('.create-form-lesson')) {
                    syncEditorToTextarea()
                    domEl('.create-form-lesson').submit();
                } else {
                    return false;
                }
            }

            function syncEditorToTextarea() {
                const editorContent = document.querySelector('.ql-editor').innerHTML;
                document.querySelector('#content').value = editorContent;
            }
        </script>
    @endpush

</x-bladewind::modal>

{{-- edit lesson --}}
<x-bladewind::modal backdrop_can_close="true" name="update-data-lesson" ok_button_action="saveUpdateDataLesson()"
    ok_button_label="Simpan" cancel_button_label="Batal" size="xl" title="Tambah Materi">

    <form method="post" class="update-form-lesson my-5">
        @csrf
        @method('PUT')
        <x-bladewind::input required="true" name="title_update" error_message="Judul tidak boleh kosong"
            label="Judul" selected_value="{{ old('title_update') }}" class="update-title-input" />

        <x-bladewind::textarea placeholder="Konten" name="content_toolbar_update" toolbar="true" except="image"
            required="true" class="update-content-input"></x-bladewind::textarea>

        <x-bladewind::input required="true" name="video_url_update" error_message="Url Video tidak boleh kosong"
            label="URL Video" selected_value="{{ old('video_url_update') }}" class="update-url-input" />

        <textarea name="content_update" id="content_update" class="hidden"></textarea>

    </form>

    @if (old('description'))
        <script>
            document.querySelector('.ql-editor').innerHTML = `{!! old('description') !!}`;
        </script>
    @endif

    @push('scripts')
        <script>
            saveUpdateDataLesson = () => {
                if (validateForm('.update-form-lesson')) {
                    syncEditorToTextarea()
                    domEl('.update-form-lesson').submit();
                } else {
                    return false;
                }
            }

            function syncEditorToTextarea() {
                const editorContent = document.querySelector('.update-form-lesson .ql-editor').innerHTML;
                document.querySelector('#content_update').value = editorContent;
            }
        </script>
    @endpush

</x-bladewind::modal>
