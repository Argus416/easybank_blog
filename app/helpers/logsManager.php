<?php

require_once 'app/models/LogSystemModel.php';

class logsManager {

    private $LogSystemModel;

    public function __construct()
    {
        $this->LogSystemModel = new LogSystemModel;
    }
    
    public function generateLogFile(){
        $file = fopen('logs.csv', 'w');
        fputcsv($file, ['userID','userIden', 'articleID', 'articleTitle', 'actionDate']);
        $data = $this->LogSystemModel->getLog();
        dump($data);
        foreach ($data as $row){
            fputcsv($file, $row);
        }
        fclose($file);
    }
}