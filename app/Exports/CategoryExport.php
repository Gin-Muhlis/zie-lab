<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CategoryExport implements FromView, WithDrawings, WithTitle, WithEvents
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        $data = $this->data;

        return view('exports.categoryExport', compact('data'));
    }

    public function title(): string
    {
        return 'Data Kategori';
    }

    public function registerEvents(): array
    {
        $data = $this->data;

        return [
            AfterSheet::class => function (AfterSheet $event) use ($data) {
                $sheet = $event->sheet->getDelegate();

                // width kolom
                $sheet->getColumnDimension('A')->setWidth(5);
                $sheet->getColumnDimension('B')->setWidth(40);
                $sheet->getColumnDimension('C')->setWidth(15);

                // tambah baris awal
                $sheet->insertNewRowBefore(1, 2);

                // set judul
                $sheet->mergeCells("A1:C1");
                $sheet->mergeCells("A2:C2");
                $sheet->setCellValue('A1', strtoupper('Data Kategori'));

                $sheet->getStyle('A1:A2')->getFont()->setSize(16);

                $sheet->getStyle('A1:A2')->getFont()->setBold(true);
                $sheet->getStyle("A1:C1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // set align tabel data
                $sheet->getStyle("A3:C" . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("A")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("C")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // set height baris
                $sheet->getRowDimension(3)->setRowHeight(30);
                $start_row = 4;
                foreach($data as $item) {
                    $sheet->getRowDimension($start_row)->setRowHeight(60);
                    $start_row++;
                }

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

    public function drawings()
    {
        $data = $this->data;
        $column = 'C';
        $start_row = 2; // dihitung dari row awal tabel data bukan row excel
        $drawings = [];

        foreach($data as $index => $item) {
           if ($item->icon) {
            $drawing = new Drawing();
            $drawing->setName('Gambar');
            $drawing->setPath(public_path($item->icon));
            $drawing->setWidth(60);
            $drawing->setCoordinates($column . $index + $start_row);
            $drawing->setOffsetX(25);
            $drawing->setOffsetY(10);

            $drawings[] = $drawing;
           }
        }


        return $drawings;
    }


}
