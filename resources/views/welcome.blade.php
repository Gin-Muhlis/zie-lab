<x-layout :profileCompany="$profile_company">
    <x-hero></x-hero>
    <x-about :profileCompany="$profile_company"></x-about>
    <x-category :categories="$categories"></x-category>
    <x-list-product :products="$products" :categories="$categories"></x-list-product>
    <x-faqs :faqs="$faqs"></x-faqs>

    @push('scripts')
        <script>
            $(function() {
                let categoriesFilter = Array.from($('.category-list-prodouct'))
                console.log(categoriesFilter)
            })
        </script>
    @endpush
</x-layout>
