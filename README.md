# gateway-smsclub
SMS Gateway для сервиса [smsclub.mobi](https://smsclub.mobi)

Установка:
```
composer require nekkoy/gateway-smsclub
```

Конфигурация `.env`
===============
```
# Включить/выключить модуль
SMSCLUB_ENABLED=true

# Ключь API
SMSCLUB_API_KEY=

# Имя отправителя в СМС
SMSCLUB_SMS_NAME=
```

Использование
===============

Создайте DTO сообщения, передав первым параметром текст, а вторым — номер получателя:
```
$message = new \Nekkoy\GatewayAbstract\DTO\MessageDTO("test", "+380123456789");
```

Затем вызовите метод отправки сообщения через фасад:
```
/** @var \Nekkoy\GatewayAbstract\DTO\ResponseDTO $response */
$response = \Nekkoy\GatewaySmsclub\Facades\GatewaySmsclub::send($message);
```

Метод возвращает DTO-ответ с параметрами:
 - message - сообщение об успешной отправке или ошибке
 - code - код ответа:
   - code < 0 - ошибка модуля
   - code > 0 - ошибка HTTP
   - code = 0 - успех
 - id - ID сообщения
