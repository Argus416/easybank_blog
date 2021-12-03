<?php

require_once 'app/models/LogSystemModel.php';

class LogSystemController{


    private $LogSystemModel;

    public function __construct()
    {
        $this->LogSystemModel = new LogSystemModel;
    }
    
    public function generateLogFile(){
        // generée le fichier logs.csv
        $file = fopen('logs.csv', 'w');

        // generée le header du fichiers
        fputcsv($file, ['logID','userID','userIden', 'articleID', 'articleTitle', 'actionDate', 'actionUtilisateur']);

        $data = $this->LogSystemModel->getLog();
        foreach ($data as $row){
            // inserer les informtations
            fputcsv($file, $row);
        }
        fclose($file);
    }
}