<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class FaqExport implements FromView, WithTitle, WithEvents
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        $data = $this->data;

        return view('exports.faqExport', compact('data'));
    }

    public function title(): string
    {
        return 'Data FAQ';
    }

    public function registerEvents(): array
    {
        $data = $this->data;

        return [
            AfterSheet::class => function (AfterSheet $event) use ($data) {
                $sheet = $event->sheet->getDelegate();

                // width kolom
                $sheet->getColumnDimension('A')->setWidth(5);
                $sheet->getColumnDimension('B')->setWidth(50);
                $sheet->getColumnDimension('C')->setWidth(80);

                // tambah baris awal
                $sheet->insertNewRowBefore(1, 2);

                // set judul
                $sheet->mergeCells("A1:C1");
                $sheet->mergeCells("A2:C2");
                $sheet->setCellValue('A1', strtoupper('Data FAQ'));

                $sheet->getStyle('A1:A2')->getFont()->setSize(16);

                $sheet->getStyle('A1:A2')->getFont()->setBold(true);
                $sheet->getStyle("A1:C1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // set align tabel data
                $sheet->getStyle("A3:C" . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("A")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("B4:B" . $sheet->getHighestRow())->getAlignment()->setWrapText(true);
                $sheet->getStyle("C4:C" . $sheet->getHighestRow())->getAlignment()->setWrapText(true);

                // set style tabel
                $sheet->getStyle('A3:C3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('EAB308');
                
                $sheet->getStyle("A3:C" . $sheet->getHighestRow())->applyFromArray([
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
