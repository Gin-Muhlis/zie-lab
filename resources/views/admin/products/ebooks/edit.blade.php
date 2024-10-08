@php
    use App\Services\Helper;
@endphp

<x-layout-panel>
    <div class="w-full">
        @include('admin.products.ebooks.modal')
        <h1 class="text-2xl font-bold mb-5">Perbarui E-Book</h1>
        <div class="w-full flex items-start justify-between gap-5 flex-wrap">
            <div class="w-full flex items-center justify-between gap-5">
                <a href="{{ route('e-books.index') }}"
                    class="flex items-center justify-center gap-1 text-sm text-gray-400">
                    <x-bladewind::icon name="arrow-left" class="!h-4 !w-4" />
                    Kembali
                </a>
                <div class="flex items-center justify-center gap-3">
                    <x-bladewind::button color="red" outline="true" class="btn-save-draft" onclick="saveDraftData()">
                        Save Draft
                    </x-bladewind::button>
                    <x-bladewind::button color="green" outline="false" class="btn-save-publish"
                        onclick="savePublishData()">
                        Publish
                    </x-bladewind::button>
                </div>
            </div>
            <form method="post" action="{{ route('e-books.update', $data->code) }}"
                class="update-form flex flex-col items-start justify-start gap-5 flex-1 create-form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-bladewind::card title="Tambahkan informasi mengenai E-Book" class="w-full relative">
                    <div class="w-full flex items-start justify-start flex-wrap md:flex-nowrap gap-5">
                        <x-bladewind::input name="title" required="true" label="Judul"
                            class="w-full product-name-input" selected_value="{{ old('title') ?? $data->title }}" />

                        <x-bladewind::input type="file" name="thumbnail" label="Thumbnail Baru"
                            class="product-image-input" accept="image/*" />

                    </div>
                    <div class="w-full flex items-start justify-start flex-wrap md:flex-nowrap gap-5">
                        <x-bladewind::input name="price_input" required="true" label="Harga"
                            class="w-full product-price-input"
                            selected_value="{{ old('price') ?? $data->formatPrice($data->price) }}" />

                        <div class="w-full">
                            <x-bladewind::select name="category_id" placeholder="Pilih Kategori" searchable="true"
                                selected_value="{{ old('category_id') ?? $data->category_id }}" label_key="name"
                                required="true" value_key="id" :data="$categories" />
                        </div>
                    </div>

                </x-bladewind::card>

                <x-bladewind::card title="Jelaskan tentang E-Book" class="w-full relative">
                    <x-bladewind::textarea placeholder="Deskripsi produk" name="description_toolbar" toolbar="true"
                        except="image" required="true"></x-bladewind::textarea>
                </x-bladewind::card>

                <x-bladewind::card title="Upload file E-Book" class="w-full relative">
                    <x-bladewind::filepicker name="file_ebook" placeholder="File E-book Baru" accepted_file_types=".pdf"
                        show_error_inline="true" />
                </x-bladewind::card>

                <x-bladewind::card title="Tambahkan benefit yang akan didapat pengguna" class="w-full relative">
                    <div class="benefits-wrapper mb-5">
                        @if (old('benefits'))
                            @foreach (old('benefits') as $benefit)
                                <div class="benefit-input">
                                    <div class="w-full flex items-start justify-start flex-nowrap gap-2">
                                        <input type="text" name="benefits" placeholder="Tambahkan Benefit"
                                            class=" !outline-none
                    !ring-0
                    border-2
                    w-full text-slate-600 dark:text-dark-300 border-slate-300/50 dark:border-dark-600 dark:bg-transparent /*dark-800*/
                    focus:outline-none
                    focus:border-2
                    focus:border-primary-500 dark:focus:border-dark-500 dark:placeholder-dark-400/60 transition-all
                    rounded-md
                    text-sm
                    px-3.5 py-[8.5px] mb-3"
                                            value="{{ $benefit }}">
                                        <div>
                                            <x-bladewind::icon name="x-mark"
                                                class="!h-6 !w-6 !text-white bg-red-500 p-1 rounded-full
        cursor-pointer hover:bg-red-600 mt-2 delete-benefit" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if (!old('benefits') && count($data->benefits) > 0)
                            @foreach ($data->benefits as $benefit)
                                <div class="benefit-input">
                                    <div class="w-full flex items-start justify-start flex-nowrap gap-2">
                                        <input type="text" name="benefits[]"
                                            class=" !outline-none
                    !ring-0
                    border-2
                    w-full text-slate-600 dark:text-dark-300 border-slate-300/50 dark:border-dark-600 dark:bg-transparent /*dark-800*/
                    focus:outline-none
                    focus:border-2
                    focus:border-primary-500 dark:focus:border-dark-500 dark:placeholder-dark-400/60 transition-all
                    rounded-md
                    text-sm
                    px-3.5 py-[8.5px] mb-3"
                                            value="{{ $benefit->benefit }}">
                                        <div id="{{ $benefit->id }}">
                                            <x-bladewind::icon name="x-mark"
                                                class="!h-6 !w-6 !text-white bg-red-500 p-1 rounded-full
    cursor-pointer hover:bg-red-600 mt-2 delete-benefit" />
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <x-bladewind::button outline="true" type="secondary" class="w-full add-benefit"
                        icon="plus"></x-bladewind::button>
                </x-bladewind::card>

                <input type="hidden" name="thumbnail_product" class="thumbail-input-product">
                <input type="hidden" name="status" class="status-product-input" value="{{ $data->status }}">
                <input type="hidden" name="price" class="price-product-input" value="{{ $data->price }}">
                <textarea name="description" id="description" class="hidden"></textarea>
                @if (old('deleted_benefits'))
                    @foreach (old('deleted_benefits') as $id)
                    <input type="hidden" name="deleted_benefits[]" value="{{ $id }}">
                    @endforeach
                @endif
            </form>
            <div class="relative w-80">
                <div class="w-full text-center h-14 border bg-white flex items-center justify-center">
                    Preview Produk
                </div>
                <div class="w-full flex items-center justify-center p-5 border border-gray-200">
                    <div class="w-56 h-80 border rounded-lg overflow-hidden relative bg-cover bg-center flex-shrink-0 product-thumbnail-preview"
                        style="background-image: url('{{ Storage::url($data->thumbnail) }}')">
                        <div
                            class="bg-primary rounded-md flex items-center justify-center px-3 py-1 text-xs text-white text-center absolute top-3 right-3 z-10 product-category-preview">
                            {{ $data->category->name }}</div>
                        <div
                            class="bg-white rounded-md p-3 z-10 absolute bottom-5 left-1/2 -translate-x-1/2 w-11/12 h-28">
                            <h5 class="text-md font-bold mb-2 leading-5 mt-1 product-name-preview">
                                {{ $data->title }}
                            </h5>
                            <div
                                class="bg-secondary rounded-md px-2 py-1 text-[8px] text-white text-center absolute left-3 -top-3">
                                E-Book</div>
                            <p class="text-xs text-slate-400 mb-2">Oleh {{ $data->author->name }}</p>
                            <p class="text-sm font-bold">Rp. <span
                                    class="product-price-preview">{{ $data->formatPrice($data->price) }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (old('description'))
        <script>
            document.querySelector('.ql-editor').innerHTML = `{!! old('description') !!}`
        </script>
    @endif

    @if (!old('description') && $data->description)
        <script>
            document.querySelector('.ql-editor').innerHTML = `{!! $data->description !!}`
        </script>
    @endif

    @push('scripts')
        <script>
            $(function() {
                const categories = @json($categories);

                let cropper
                let image = document.getElementById('image')

                $('.product-name-input').on('input', e => {
                    const value = $(e.target).val();
                    const splitTitle = value.split(' ')
                    const sliceTitle = splitTitle.slice(0, 3)
                    const titleProduct = splitTitle.length > 3 ? `${sliceTitle.join(' ')}...` : sliceTitle.join(
                        ' ')

                    $('.product-name-preview').html(titleProduct)
                })

                $('.product-image-input').on('change', e => {
                    const file = e.target.files[0]

                    showModal('crop-image')

                    let done = function(url) {
                        $(image).attr('src', url)
                        $(image).show()

                        if (cropper) {
                            cropper.destroy()
                        }

                        cropper = new Cropper(image, {
                            aspectRatio: 2 / 3,
                            viewMode: 1,
                            autoCropArea: 1,
                            cropBoxResizable: false,
                            dragMode: 'move',
                            ready() {
                                const containerData = cropper.getContainerData();
                                const cropBoxWidth = containerData.width *
                                    0.6;
                                const cropBoxHeight = cropBoxWidth * (2 /
                                    3);

                                cropper.setCropBoxData({
                                    width: cropBoxWidth,
                                    height: cropBoxHeight
                                });
                            },
                            crop(event) {

                                var canvas = cropper.getCroppedCanvas({
                                    width: 500,
                                    height: 600
                                });
                                $('.product-thumbnail-preview').css('background-image', 'url(' +
                                    canvas.toDataURL() +
                                    ')');
                                $('.thumbail-input-product').val(canvas.toDataURL('image/jpeg'));

                            }
                        })
                    }

                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            done(e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                })

                $('.product-price-input').on('input', e => {
                    const value = $(e.target).val();
                    const price = parseInt(value.replace(/[^0-9]/g, ''))
                    const formattedValue = new Intl.NumberFormat('id-ID').format(price)

                    $(e.target).val(formattedValue)
                    $('.price-product-input').attr('value', value.replace(/\./g, ''))
                    $('.product-price-preview').html(formattedValue)
                })

                $('input[name="category_id"]').on('change', e => {
                    const value = parseInt($(e.target).val());
                    const category = categories.find(item => item.id === value)

                    $('.product-category-preview').html(category.name)
                })

                $('.add-benefit').click(function() {
                    let text = ` <div class="w-full flex items-start justify-start flex-nowrap gap-2">
                                        <input type="text" name="benefits[]" placeholder="Tambahkan Benefit"
                                            class=" !outline-none
                    !ring-0
                    border-2
                    w-full text-slate-600 dark:text-dark-300 border-slate-300/50 dark:border-dark-600 dark:bg-transparent /*dark-800*/
                    focus:outline-none
                    focus:border-2
                    focus:border-primary-500 dark:focus:border-dark-500 dark:placeholder-dark-400/60 transition-all
                    rounded-md
                    text-sm
                    px-3.5 py-[8.5px] mb-3">
                                        <div>
                                            <x-bladewind::icon name="x-mark"
                                                class="!h-6 !w-6 !text-white bg-red-500 p-1 rounded-full
    cursor-pointer hover:bg-red-600 mt-2 delete-benefit" />
                                        </div>

                                    </div>`
                    $('.benefits-wrapper').append(text)
                });

                $('.benefits-wrapper').on('click', '.delete-benefit', function(e) {

                    let parentBenefit = $(this).parent()
                    let benefitValue = $(parentBenefit).attr('id')

                    $(parentBenefit.parent()).remove()

                    if (benefitValue != undefined) {
                        let inputDeleteBenefits =
                            `<input type="hidden" name="deleted_benefits[]" value="${benefitValue}" >`
                        $('.create-form').append(inputDeleteBenefits)
                    }
                })

                function syncEditorToTextarea() {
                    const editorContent = document.querySelector('.ql-editor').innerHTML;
                    document.querySelector('#description').value = editorContent;
                }

                saveDraftData = () => {
                    $('.status-product-input').attr('value', 'draft')
                    syncEditorToTextarea();
                    if (validateForm('.create-form')) {
                        domEl('.create-form').submit();
                    } else {
                        return false;
                    }
                }
                savePublishData = () => {
                    $('.status-product-input').attr('value', 'published')
                    syncEditorToTextarea();
                    if (validateForm('.create-form')) {
                        domEl('.create-form').submit();
                    } else {
                        return false;
                    }
                }


            })
        </script>
    @endpush

</x-layout-panel>
