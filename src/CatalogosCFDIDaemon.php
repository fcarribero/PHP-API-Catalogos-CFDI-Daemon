<?php


namespace Advans\Api\CatalogosCFDIDaemon;

use Exception;

class CatalogosCFDIDaemon {

    protected Config $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
    }

    /**
     * @return bool|string
     * @throws CatalogosCFDIException
     */
    public function version() {
        return trim($this->call('version'));
    }

    /**
     * @param $catalogo
     * @param $value
     * @param null $fecha (Formato YYYY-MM-DD)
     * @return bool|string
     * @throws CatalogosCFDIException
     */
    public function getItem($catalogo, $value, $fecha = null) {
        if (gettype($value) == 'object' && get_class($value) == CustomWhere::class) {
            return $this->call($catalogo, null, $value->parse(), $fecha);
        } else {
            return $this->call($catalogo, $value, null, $fecha);
        }
    }

    protected function call($catalogo, $value = null, $where = null, $fecha = null) {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if (!socket_connect($socket, $this->config->ip, $this->config->port)) {
            throw new Exception('No se pudo conectar con API-Catalogos-CFDI');
        }

        socket_write($socket, json_encode([
            'catalogo' => $catalogo,
            'value' => $value,
            'where' => $where,
            'fecha' => $fecha,
        ]));

        $response = socket_read($socket, 1024 * 1024);

        socket_close($socket);

        return json_decode($response);
    }
}