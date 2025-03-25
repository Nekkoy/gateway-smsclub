<?php

namespace Nekkoy\GatewaySmsclub\Services;

use Nekkoy\GatewaySmsclub\DTO\ConfigDTO;

/**
 *
 */
class GatewayService
{
    protected $config;

    public function __construct()
    {
        $this->config = config('gateway-smsclub', []);
    }

    /**
     * @return ConfigDTO
     */
    public function getConfig()
    {
        return new ConfigDTO($this->config);
    }
}
