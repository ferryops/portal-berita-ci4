<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NewsModel extends Model
{
    protected $jsonPath = ROOTPATH . 'app/Data/news.json';

    public function getNews()
    {
        $jsonData = file_get_contents($this->jsonPath);
        return json_decode($jsonData, true);
    }

    public function getNewsById($id)
    {
        $news = $this->getNews();
        foreach ($news as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

    public function getNewsBySlug($slug)
    {
        $news = $this->getNews();
        foreach ($news as $item) {
            if (url_title($item['title'], '-', true) == $slug) {
                return $item;
            }
        }
        return null;
    }

    public function exportToSpreadsheet()
    {
        $news = $this->getNews();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Title');
        $sheet->setCellValue('C1', 'Content');

        $row = 2;
        foreach ($news as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['title']);
            $sheet->setCellValue('C' . $row, $item['content']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'news_export.xlsx';
        $writer->save($filename);

        return $filename;
    }
}
