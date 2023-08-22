<?php

use jblond\morse\Morse;

require '../vendor/autoload.php';

$morse = new Morse();
$morseBinary = $morse->stringToMorse($_POST['morseText']);
$morseCode = $morse->dotDash($morseBinary);
$return = [
    'binary' => $morseBinary,
    'text' => $morseCode
];
header("Content-type: application/json; charset=utf-8");
echo json_encode($return, JSON_PRETTY_PRINT|JSON_THROW_ON_ERROR);
