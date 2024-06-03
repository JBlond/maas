<?php

use jblond\morse\Wave;

error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('memory_limit', '2048M');

require '../vendor/autoload.php';

$wave = new Wave();
$wave->setCwSpeed((int) $_POST['wpm']);
$wave->setFrequency((int) $_POST['frequency']);
header('Content-type: audio/wav');
$date = date("Y-m-d_H-i-s");
header("Content-Disposition: inline; filename=$date-record.wav");
echo $wave->generate($_POST['morse-text']);
