<?php

return [
    "enabled" => env('SMSCLUB_ENABLED', false),
    "api_key" => env('SMSCLUB_API_KEY', ''),
    "name_sms" => env('SMSCLUB_SMS_NAME', ''),
    "priority" => env('SMSCLUB_PRIORITY', 1),
    "prefix" => env('SMSCLUB_PREFIX', "any"),
    "tags" => env('SMSCLUB_TAGS', '#smsclub, #club'),
    "default" => env('SMSCLUB_DEFAULT', false),
    "devmode" => env('SMSCLUB_DEVMODE', false),
];
