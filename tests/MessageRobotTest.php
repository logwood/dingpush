<?php

require './vendor/autoload.php';

use Logwood\DingPush\MessageRobot;
use Logwood\DingPush\Messages\Text;

$access_token = 'x';
$secret = 'x';

$app = MessageRobot::create($access_token, $secret);

/*
// 文本消息
{
    "msgtype": "text",
    "text": {
        "content": "我就是我, 是不一样的烟火"
    },
    "at": {
        "atMobiles": [
            "156xxxx1111",
            "189xxxx1111"
        ],
        "isAtAll": false
    }
}
*/
$msqBox = <<<EOF
- msg
EOF;

$textInstance = Text::create($msqBox);

// 开启at
// $textInstance->isAt = true;
var_export($textInstance->toArray());
$app->send($textInstance->toArray());
