<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Home extends BaseController
{

    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }
    public function index(): string
    {
        $news = $this->newsModel->getNews();

        $data = [
            'news' => $news
        ];

        return view('welcome_message', $data);
    }
}
