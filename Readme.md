### dingtalk bot

simple 

> 钉钉官网文档比较详细的说明 文档地址：https://ding-doc.dingtalk.com/doc#/serverapi2/qf2nxq
> 官方也提供了SDK，需要下载一堆SDK，在一些临时使用场景中，可能不需的文件


### Usage
```php
$msqBox = <<<EOF
message
EOF;

$textInstance = Text::create($msqBox);
// 开启at
// $textInstance->isAt = true;
// $textInstance->setAtMobiles(['12345678901']);
var_export($textInstance->toArray());
$app->send($textInstance->toArray());
```



