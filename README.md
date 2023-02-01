# advans/php-api-catalogos-cfdi-daemon

[![Latest Stable Version](https://img.shields.io/packagist/v/advans/php-api-catalogos-cfdi-daemon?style=flat-square)](https://packagist.org/packages/advans/php-api-catalogos-cfdi-daemon)
[![Total Downloads](https://img.shields.io/packagist/dt/advans/php-api-catalogos-cfdi-daemon?style=flat-square)](https://packagist.org/packages/advans/php-api-catalogos-cfdi-daemon)

## Instalación usando Composer

```sh
$ composer require advans/php-api-catalogos-cfdi-daemon
```
|
## Ejemplo

````
$config = new \Advans\Api\CatalogosCFDIDaemon\Config([
    'ip' => '**************************',
    'port' => '**********************'
]);

$servicio = new \Advans\Api\CatalogosCFDIDaemon\CatalogosCFDIDaemon($config);

$item = $servicio->getItem('c_CodigoPostal', '97000', '2022-01-01');

````

## Configuración

| Parámetro | Valor por defecto | Descripción   |
|:----------|:------------------|:--------------|
| ip        | null              | URL de la API |
| port      | null              | API Key       |

