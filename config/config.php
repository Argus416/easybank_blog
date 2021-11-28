<?php
use Symfony\Component\Dotenv\Dotenv;

// require_once __DIR__ . "/vendor/autoload.php";
// require_once "../vendor/autoload.php";
require_once "vendor/autoload.php";


// * Importer les variables d'environment
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');