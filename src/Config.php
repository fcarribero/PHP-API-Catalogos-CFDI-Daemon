<?php

namespace Advans\Api\CatalogosCFDIDaemon;

use Exception;

class Config {
    public $ip, $port;

    public function __construct($args) {
        $this->ip = $args['ip'] ?? null;
        if (!$this->ip) {
            throw new Exception('ip is required');
        }

        $this->port = $args['port'] ?? null;
        if (!$this->port) {
            throw new Exception('port is required');
        }
    }
}