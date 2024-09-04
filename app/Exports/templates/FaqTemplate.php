<?php

namespace App\Exports\templates;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class FaqTemplate implements FromView, WithEvents
{
    public function view(): View
    {
        return view('templates.faq');
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // width kolom
                $sheet->getColumnDimension('A')->setWidth(40);
                $sheet->getColumnDimension('B')->setWidth(80);

                // tambah baris awal
                $sheet->insertNewRowBefore(1, 4);

                // set judul
                $sheet->mergeCells("A1:B1");
                $sheet->mergeCells("A2:B2");
                $sheet->mergeCells("A3:B3");
                $sheet->setCellValue('A1', 'Isi data di kolom dibawah header tabel');
                $sheet->setCellValue('A2', 'Jika terjadi error data kosong di baris tertentu, clear cell tersebut atau semua cell dari cell terakhir data');

                $sheet->getStyle('A1:A3')->getFont()->setSize(10);
                $sheet->getStyle('A1:A3')->getFont()->getColor()->setARGB(Color::COLOR_RED);

            
                // set align tabel data
                $sheet->getStyle("A5:B5")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("A5:B" . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::HORIZONTAL_CENTER);

               
                $sheet->getStyle("A6")->getAlignment()->setWrapText(true);
                $sheet->getStyle("B6")->getAlignment()->setWrapText(true);

                // set style tabel
                $sheet->getStyle('A5:B5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('EAB308');

                $sheet->getStyle("A5:B" . $sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);

     
            },
        ];
    }
}
