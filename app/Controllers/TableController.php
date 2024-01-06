<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TableController extends BaseController
{
    public function index()
    {
        return view('table_view');
    }

    public function exportToExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Harga');
        $sheet->setCellValue('C1', 'Deskripsi');

        $data = [
            ['Produk A', '10000', 'Deskripsi Produk A'],
            ['Produk B', '15000', 'Deskripsi Produk B'],
        ];

        foreach ($data as $key => $row) {
            $sheet->setCellValue('A' . ($key + 2), $row[0]);
            $sheet->setCellValue('B' . ($key + 2), $row[1]);
            $sheet->setCellValue('C' . ($key + 2), $row[2]);
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="tabel_produk.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
