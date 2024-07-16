<x-layout-panel>
    <div class="w-full">
        <h1 class="text-2xl font-bold mb-5">Dashboard</h1>
        <div class="flex items-center justify-start gap-5 flex-wrap mb-5">
            <x-bladewind::card class="flex-1">
                <div class="w-full flex items-center justify-start gap-4">
                    <x-bladewind::icon name="document" class="!h-14 !w-14 !text-primary bg-primary/10 p-4 rounded-full" />
                    <div class="flex items-start justify-start flex-col">
                        <span class="text-2xl font-bold text-black">100</span>
                        <span class="text-sm text-slate-300">Produk Digital</span>
                    </div>
                </div>
            </x-bladewind::card>
            <x-bladewind::card class="flex-1">
                <div class="w-full flex items-center justify-start gap-4">
                    <x-bladewind::icon name="user"
                        class="!h-14 !w-14 !text-indigo-700 bg-indigo-100 p-4 rounded-full" />
                    <div class="flex items-start justify-start flex-col">
                        <span class="text-2xl font-bold text-black">100</span>
                        <span class="text-sm text-slate-300">Pengguna</span>
                    </div>
                </div>
            </x-bladewind::card>
            <x-bladewind::card class="flex-1">
                <div class="w-full flex items-center justify-start gap-4">
                    <x-bladewind::icon name="shopping-cart"
                        class="!h-14 !w-14 !text-pink-700 bg-pink-100 p-4 rounded-full" />
                    <div class="flex items-start justify-start flex-col">
                        <span class="text-2xl font-bold text-black">100</span>
                        <span class="text-sm text-slate-300">Transaksi</span>
                    </div>
                </div>
            </x-bladewind::card>
            <x-bladewind::card class="flex-1">
                <div class="w-full flex items-center justify-start gap-4">
                    <x-bladewind::icon name="banknotes"
                        class="!h-14 !w-14 !text-green-700-700 bg-green-100 p-4 rounded-full" />
                    <div class="flex items-start justify-start flex-col">
                        <span class="text-2xl font-bold text-black">100.000.000</span>
                        <span class="text-sm text-slate-300">Pendapatan</span>
                    </div>
                </div>
            </x-bladewind::card>
        </div>

        <x-bladewind::card title="Data Penjualan Produk Digital">
            <div class="overflow-x-auto w-full">
                <canvas id="chart"></canvas>
            </div>
        </x-bladewind::card>
    </div>

    @if (session('success'))
        @push('scripts')
            <script>
                showNotification('Login Berhasil', '{{ session('success') }}', 'success');
            </script>
        @endpush
    @endif


    @push('scripts')
        <script>
            $(function() {
                let ctx = $('#chart')[0].getContext('2d')

                const chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                        datasets: [{
                                label: 'E-Book',
                                data: [10, 40, 30, 20, 0, 50, 0, 10, 70, 90, 10, 20],
                                backgroundColor: 'rgba(255, 205, 86, 0.2)',
                                borderColor: 'rgb(255, 205, 86)',
                                borderWidth: 1
                            },
                            {
                                label: 'E-Course',
                                data: [50, 10, 0, 0, 0, 20, 10, 50, 80, 30, 0, 0],
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgb(54, 162, 235)',
                                borderWidth: 1
                            },
                            {
                                label: 'E-File',
                                data: [20, 30, 0, 20, 10, 0, 0, 0, 40, 20, 70, 10],
                                backgroundColor:  'rgba(153, 102, 255, 0.2)',
                                borderColor: 'rgb(153, 102, 255)',
                                borderWidth: 1
                            },
                            
                        ]
                    },
                    options: {
                        responsive: true,
                        // maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                })
            })
        </script>
    @endpush
</x-layout-panel>
