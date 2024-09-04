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


class UserExport implements FromView, WithDrawings, WithTitle, WithEvents
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        $data = $this->data;

        return view('exports.userExport', compact('data'));
    }

    public function title(): string
    {
        return 'Data Pengguna';
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
                $sheet->getColumnDimension('C')->setWidth(40);
                $sheet->getColumnDimension('D')->setWidth(30);
                $sheet->getColumnDimension('E')->setWidth(25);

                // tambah baris awal
                $sheet->insertNewRowBefore(1, 2);

                // set judul
                $sheet->mergeCells("A1:C1");
                $sheet->mergeCells("A2:C2");
                $sheet->setCellValue('A1', strtoupper('Data Pengguna'));

                $sheet->getStyle('A1:A2')->getFont()->setSize(16);

                $sheet->getStyle('A1:A2')->getFont()->setBold(true);
                $sheet->getStyle("A1:E1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // set align tabel data
                $sheet->getStyle("A3:E" . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("A")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("E")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // set height baris
                $sheet->getRowDimension(3)->setRowHeight(30);
                $start_row = 4;
                foreach($data as $item) {
                    $sheet->getRowDimension($start_row)->setRowHeight(100);
                    $start_row++;
                }

                // set style tabel
                $sheet->getStyle('A3:E3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('EAB308');
                
                $sheet->getStyle("A3:E" . $sheet->getHighestRow())->applyFromArray([
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
        $column = 'E';
        $start_row = 2; // dihitung dari row awal tabel data bukan row excel
        $drawings = [];

        foreach($data as $index => $item) {
           if ($item->image) {
            $drawing = new Drawing();
            $drawing->setName('Gambar');
            $drawing->setPath(public_path($item->image));
            $drawing->setWidth(100);
            $drawing->setHeight(100);
            $drawing->setCoordinates($column . $index + $start_row);
            $drawing->setOffsetX(25);
            $drawing->setOffsetY(20);
            

            $drawings[] = $drawing;
           }
        }


        return $drawings;
    }
}
