<x-layout :profileCompany="$profile_company">

    <x-bladewind::notification />

    <x-hero></x-hero>
    <x-about :profileCompany="$profile_company"></x-about>
    <x-category :categories="$categories"></x-category>
    <x-list-product :products="$products" :categories="$categories" :filterCategory="$filter_category"></x-list-product>
    <x-faqs :faqs="$faqs"></x-faqs>

    @if (session('success'))
        @push('scripts')
            <script>
                showNotification('Logout', 'Logout berhasil', 'success');
            </script>
        @endpush
    @endif

    @error('forbidden')
        @push('scripts')
            <script>
                showNotification('Dilarang!', '{{ $message }}', 'warning');
            </script>
        @endpush
    @enderror

    @push('scripts')
        <script>
            $(function() {
                $('#input-search-hero').on('input', function() {
                    let value = this.value
                    console.log(value)
                    $('#input-value-search').val(value)
                })

                $('.btn-search-hero').on('click', function() {
                    $('#form-search-hero').submit()
                })
            })
        </script>
    @endpush
</x-layout>
