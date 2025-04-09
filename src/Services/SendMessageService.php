<?php

namespace Nekkoy\GatewaySmsclub\Services;

use Nekkoy\GatewayAbstract\Services\AbstractSendMessageService;
use Nekkoy\GatewaySmsclub\DTO\ConfigDTO;

/**
 *
 */
class SendMessageService extends AbstractSendMessageService
{
    /** @var string */
    protected $api_url = 'https://im.smsclub.mobi';

    /** @var ConfigDTO */
    protected $config;

    /**  */
    protected function init() {
        $this->header = [
            'Content-Type: application/json',
            sprintf('Authorization: Bearer %s', $this->config->api_key)
        ];
    }

    /** @return string */
    protected function url()
    {
        return $this->api_url . '/sms/send';
    }

    /** @return mixed */
    protected function data()
    {
        $request = [
            'phone' => [
                "{$this->message->destination}"
            ],
            'message' => $this->message->text,
            'src_addr' => $this->config->name_sms
        ];

        return json_encode($request);
    }

    /** @return mixed */
    protected function development()
    {
        $this->response_code = 0;

        return '{
            "success_request": {
                "info": {
                    "106": "380989361131"
                }
            }
        }';
    }

    /**
     * @return void
     */
    protected function response()
    {
        // {"success_request":{"add_info":{"380XXXXXXXX":"Некорректный номер получателя"}}}
        $response = json_decode($this->response, true);
        if( isset($response["success_request"]["info"]) ) {
            $this->response_code = 0;
            $this->message_id = key($response["success_request"]["info"]);
        } elseif( isset($response["name"], $response["message"]) ) {
            $this->response_code = -1;
            $this->response_message = "[{$response["name"]}] {$response["message"]}";
        } elseif( isset($response["success_request"]["add_info"]) ) {
            $this->response_code = -1;
            $this->response_message = json_encode($response["success_request"]["add_info"], JSON_UNESCAPED_UNICODE);
        }
    }
}
