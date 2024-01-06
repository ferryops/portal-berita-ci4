<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function index()
    {
        $news = $this->newsModel->getNews();

        $data = [
            'news' => $news
        ];

        return view('news_view', $data);
    }

    public function exportToPdf($id)
    {

        $newsModel = new NewsModel();
        $news = $newsModel->getNewsById($id);

        if (!$news) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan.');
        }

        $data = [
            'id' => $news['id'],
            'title' => $news['title'],
            'content' => $news['content']
        ];

        $html = view('pdf_view', $data);

        try {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->render();
            $dompdf->stream($news['title'] . '.pdf');
        } catch (\Exception $e) {
            echo "Terjadi kesalahan: " . $e->getMessage();
        }
    }


    public function detail($slug)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsBySlug($slug);

        if (!$news) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan.');
        }

        $data = [
            'id' => $news['id'],
            'title' => $news['title'],
            'content' => $news['content'],
        ];

        $titlePage = $news['title'] . ' - Portal Berita';

        return view('news_detail_view', $data, ['title' => $titlePage]);
    }

    public function export()
    {
        $newsModel = new NewsModel();
        $filename = $newsModel->exportToSpreadsheet();

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        readfile($filename);
        unlink($filename);
    }
}
