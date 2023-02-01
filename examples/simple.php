<?php

use Advans\Api\CatalogosCFDIDaemon\CustomWhere;

require __DIR__ . '/../vendor/autoload.php';

$config = new \Advans\Api\CatalogosCFDIDaemon\Config([
    'ip' => $argv[1],
    'port' => $argv[2]
]);

$catalogos = new \Advans\Api\CatalogosCFDIDaemon\CatalogosCFDIDaemon($config);

$item = $catalogos->getItem('c_CodigoPostal', '97000', '2022-01-01');

var_dump($item);

$item = $catalogos->getItem('c_CodigoPostal', new CustomWhere('value=:value', ['value' => '97000']), '2022-01-01');

var_dump($item);
