<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $jsonPath = ROOTPATH . 'app/Data/report.json';

    public function getReportData()
    {
        $jsonData = file_get_contents($this->jsonPath);
        return json_decode($jsonData, true);
    }
}
