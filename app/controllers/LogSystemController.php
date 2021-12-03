<?php

require_once 'app/models/LogSystemModel.php';

class LogSystemController{


    private $LogSystemModel;

    public function __construct()
    {
        $this->LogSystemModel = new LogSystemModel;
    }
    
    public function generateLogFile(){
        $file = fopen('logs.csv', 'w');
        fputcsv($file, ['userID','userIden', 'articleID', 'articleTitle', 'actionDate']);
        $data = $this->LogSystemModel->getLog();
        foreach ($data as $row){
            fputcsv($file, $row);
        }
        fclose($file);
    }
}