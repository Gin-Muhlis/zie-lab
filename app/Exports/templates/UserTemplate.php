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
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class UserTemplate implements FromView, WithEvents, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('templates.user');
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // width kolom
                $sheet->getColumnDimension('A')->setWidth(50);
                $sheet->getColumnDimension('B')->setWidth(50);
                $sheet->getColumnDimension('C')->setWidth(40);
                $sheet->getColumnDimension('D')->setWidth(30);
                $sheet->getColumnDimension('E')->setWidth(25);


                // tambah baris awal
                $sheet->insertNewRowBefore(1, 4);

                // set judul
                $sheet->mergeCells("A1:E1");
                $sheet->mergeCells("A2:E2");
                $sheet->mergeCells("A3:E3");
                $sheet->mergeCells("A4:E4");
                $sheet->setCellValue('A1', 'Isi data di kolom dibawah header tabel');
                $sheet->setCellValue('A2', 'Tempatkan gambar di cell dengan benar');
                $sheet->setCellValue('A3', 'Jika terjadi error data kosong di baris tertentu, clear cell tersebut atau semua cell dari cell terakhir data');

                $sheet->getStyle('A1:A3')->getFont()->setSize(10);
                $sheet->getStyle('A1:A3')->getFont()->getColor()->setARGB(Color::COLOR_RED);

            
                // set align tabel data
                $sheet->getStyle("A5:E5")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("A5:E" . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::HORIZONTAL_CENTER);

                // set height baris
                $sheet->getRowDimension(6)->setRowHeight(100);

                // set style tabel
                $sheet->getStyle('A5:E5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('EAB308');

                $sheet->getStyle("A5:E" . $sheet->getHighestRow())->applyFromArray([
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
        $drawing->setPath(public_path('images/dummy/avatar.png'));
        $drawing->setWidth(100);
        $drawing->setHeight(100);
        $drawing->setCoordinates('E2');
        $drawing->setOffsetX(20);
        $drawing->setOffsetY(25);

        return $drawing;
    }
}
