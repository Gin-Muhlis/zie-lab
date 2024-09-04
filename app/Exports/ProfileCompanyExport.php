<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ProfileCompanyExport implements FromView, WithDrawings, WithTitle, WithEvents
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        $data = $this->data;

        return view('exports.profileCompanyExport', compact('data'));
    }

    public function title(): string
    {
        return 'Data Biodata Perusahaan';
    }

    public function registerEvents(): array
    {
        $data = $this->data;

        return [
            AfterSheet::class => function (AfterSheet $event) use ($data) {
                $sheet = $event->sheet->getDelegate();

                // width kolom
                $sheet->getColumnDimension('A')->setWidth(15);
                $sheet->getColumnDimension('B')->setWidth(20);
                $sheet->getColumnDimension('C')->setWidth(30);
                $sheet->getColumnDimension('D')->setWidth(50);
                $sheet->getColumnDimension('E')->setWidth(60);
                $sheet->getColumnDimension('F')->setWidth(20);

                // tambah baris awal
                $sheet->insertNewRowBefore(1, 2);

                // set judul
                $sheet->mergeCells("A1:F1");
                $sheet->mergeCells("A2:F2");
                $sheet->setCellValue('A1', strtoupper('Data Biodata Perusahaan'));

                $sheet->getStyle('A1:A2')->getFont()->setSize(16);

                $sheet->getStyle('A1:A2')->getFont()->setBold(true);
                $sheet->getStyle("A1:C1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // set align tabel data
                $sheet->getStyle("A3:F" . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("A3:F3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("F")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("D4")->getAlignment()->setWrapText(true);
                $sheet->getStyle("E4")->getAlignment()->setWrapText(true);

                // set height baris
                $sheet->getRowDimension(3)->setRowHeight(30);
                $sheet->getRowDimension(4)->setRowHeight(40);

                // set style tabel
                $sheet->getStyle('A3:F3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('EAB308');

                $sheet->getStyle("A3:F" . $sheet->getHighestRow())->applyFromArray([
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
        $path = str_replace('public', 'storage', $data->icon);

        $drawing = new Drawing();
        $drawing->setName('Gambar');
        $drawing->setPath(public_path($path));
        $drawing->setWidth(60);
        $drawing->setHeight(30);
        $drawing->setCoordinates('F2');
        $drawing->setOffsetX(20);
        $drawing->setOffsetY(15);

        return $drawing;
    }
}
