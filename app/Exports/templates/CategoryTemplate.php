<?php

namespace App\Exports\templates;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CategoryTemplate implements FromView, WithEvents, WithDrawings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('templates.category');
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // width kolom
                $sheet->getColumnDimension('A')->setWidth(40);
                $sheet->getColumnDimension('B')->setAutoSize(true);

                // tambah baris awal
                $sheet->insertNewRowBefore(1, 4);

                // set judul
                $sheet->mergeCells("A1:B1");
                $sheet->mergeCells("A2:B2");
                $sheet->mergeCells("A3:B3");
                $sheet->setCellValue('A1', 'Isi data di kolom dibawah header tabel');
                $sheet->setCellValue('A2', 'Tempatkan gambar di cell dengan benar');
                $sheet->setCellValue('A3', 'Jika terjadi error data kosong di baris tertentu, clear cell tersebut atau semua ceel dari cell terakhir data');

                $sheet->getStyle('A1:A3')->getFont()->setSize(10);
                $sheet->getStyle('A1:A3')->getFont()->getColor()->setARGB(Color::COLOR_RED);

            
                // set align tabel data
                $sheet->getStyle("A5:B5")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("A5:B" . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::HORIZONTAL_CENTER);

                // set height baris
                $sheet->getRowDimension(6)->setRowHeight(40);

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

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Gambar');
        $drawing->setPath(public_path('images/dummy/category-icon.png'));
        $drawing->setWidth(40);
        $drawing->setCoordinates('B2');
        $drawing->setOffsetX(10);
        $drawing->setOffsetY(10);

        return $drawing;
    }
}
