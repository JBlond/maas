<?php

use jblond\maas\Maas;

require '../vendor/autoload.php';

$template = new Maas();
echo $template->render(
    'index.html.twig',
    [
        'headline' => 'MaaS'

    ]
);
