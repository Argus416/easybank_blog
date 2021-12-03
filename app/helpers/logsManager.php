<?php

require_once 'app/models/LogSystemModel.php';

class logsManager {

    private $LogSystemModel;

    public function __construct()
    {
        self::$LogSystemModel = new LogSystemModel;
    }
    
    public static function createAndAddToLog(INT $idUser,  $idArticle, STRING $actionUtilisteur){
        $logs = fopen('log.txt', 'a+');
        fwrite($logs, $actionUtilisteur);
        // self::$LogSystemModel->addToLog($idUser, $idArticle, $actionUtilisteur);
        fclose($logs);
    }
}