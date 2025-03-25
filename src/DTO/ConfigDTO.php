<?php

namespace Nekkoy\GatewaySmsclub\DTO;

use Nekkoy\GatewayAbstract\DTO\AbstractConfigDTO;

/**
 *
 */
class ConfigDTO extends AbstractConfigDTO
{
    /**
     * Ключь АПИ
     * @var string
     */
    public $api_key;

    /**
     * Имя при отправке через СМС
     * @var string
     */
    public $name_sms;

    /**
     * @var string
     */
    public $handler = \Nekkoy\GatewaySmsclub\Services\SendMessageService::class;
}
