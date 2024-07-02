<div class="container px-5 md:px-0 py-28">
    <h2 class="text-center font-lato text-xl md:text-2xl font-extrabold mb-3">FAQ</h2>
    <h2 class="text-center font-lato text-3xl md:text-4xl font-extrabold mb-14 text-primary">Frequently Asked Question</h2>
    <div class="flex items-center justify-center">
        <div class="p-5 border-2 border-primary rounded-t-md overflow-hidden">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo Zie Lab">
        </div>
    </div>
    <div class="w-full p-5 md:p-10 border-2 border-primary rounded-md font-inter">
        <div class="w-full relative border-b-2 border-slate-500 pb-0 parent-question mb-5">
            <div class="flex items-center justify-between mb-5">
                <span class="font-bold">Bagaimana cara melakukan pembayaran?</span>
                <x-bladewind::icon name="chevron-down" class="!h-6 !w-6 cursor-pointer open-answer transition-all duration-500" />
            </div>
            <div class="w-full h-0 overflow-hidden transition-all duration-500" id="answer">
                <p>
                    Anda bisa melakukan pembayaran dengan tipe pembayaran yang tersedia. Mulai dari E-Wallet, Virtual
                    Account, Indomaret, Alfamaret, dll.
                </p>
            </div>
        </div>
        <div class="w-full relative border-b-2 border-slate-500 pb-0 parent-question mb-5">
            <div class="flex items-center justify-between mb-5">
                <span class="font-bold">Bagaimana cara melakukan pembayaran?</span>
                <x-bladewind::icon name="chevron-down" class="!h-6 !w-6 cursor-pointer open-answer transition-all duration-500" />
            </div>
            <div class="w-full h-0 overflow-hidden transition-all duration-500" id="answer">
                <p>
                    Anda bisa melakukan pembayaran dengan tipe pembayaran yang tersedia. Mulai dari E-Wallet, Virtual
                    Account, Indomaret, Alfamaret, dll.
                </p>
            </div>
        </div>
        <div class="w-full relative border-b-2 border-slate-500 pb-0 parent-question mb-5">
            <div class="flex items-center justify-between mb-5">
                <span class="font-bold">Bagaimana cara melakukan pembayaran?</span>
                <x-bladewind::icon name="chevron-down" class="!h-6 !w-6 cursor-pointer open-answer transition-all duration-500" />
            </div>
            <div class="w-full h-0 overflow-hidden transition-all duration-500" id="answer">
                <p>
                    Anda bisa melakukan pembayaran dengan tipe pembayaran yang tersedia. Mulai dari E-Wallet, Virtual
                    Account, Indomaret, Alfamaret, dll.
                </p>
            </div>
        </div>
        <div class="w-full relative border-b-2 border-slate-500 pb-0 parent-question mb-5">
            <div class="flex items-center justify-between mb-5">
                <span class="font-bold">Bagaimana cara melakukan pembayaran?</span>
                <x-bladewind::icon name="chevron-down" class="!h-6 !w-6 cursor-pointer open-answer transition-all duration-500" />
            </div>
            <div class="w-full h-0 overflow-hidden transition-all duration-500" id="answer">
                <p>
                    Anda bisa melakukan pembayaran dengan tipe pembayaran yang tersedia. Mulai dari E-Wallet, Virtual
                    Account, Indomaret, Alfamaret, dll.
                </p>
            </div>
        </div>
        <div class="w-full relative border-b-2 border-slate-500 pb-0 parent-question mb-5">
            <div class="flex items-center justify-between mb-5">
                <span class="font-bold">Bagaimana cara melakukan pembayaran?</span>
                <x-bladewind::icon name="chevron-down" class="!h-6 !w-6 cursor-pointer open-answer transition-all duration-500" />
            </div>
            <div class="w-full h-0 overflow-hidden transition-all duration-500" id="answer">
                <p>
                    Anda bisa melakukan pembayaran dengan tipe pembayaran yang tersedia. Mulai dari E-Wallet, Virtual
                    Account, Indomaret, Alfamaret, dll.
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            $('.open-answer').on('click', function() {

                const answer = $(this).closest('.parent-question').find('#answer');
                const parentQuestion = $(this).closest('.parent-question');
                const isOpen = answer.height() > 0;

                if (isOpen) {
                    answer.css('height', '0');
                    answer.css('margin-bottom', '0');

                    $(this).css('transform', 'rotate(0deg)')
                } else {
                    const height = answer.get(0).scrollHeight;
                    answer.css('height', height + 'px');
                    answer.css('margin-bottom', 20 + 'px');

                    $(this).css('transform', 'rotate(180deg)')
                }
            });
        });
    </script>
@endpush
