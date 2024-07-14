<x-layout-panel>

    <x-bladewind::notification />

    <div class="w-full p-8">
        <h1 class="text-2xl font-bold mb-5">Dashboard</h1>
    </div>
    @if (session('success'))
        @push('scripts')
        <script>
            showNotification('Login Berhasil', '{{ session('success') }}', 'success');
        </script>
        @endpush
    @endif
</x-layout-panel>
