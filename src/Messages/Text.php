<?php
namespace Logwood\DingPush\Messages;

class Text extends Message
{
    /**
     * @var string 消息
     */
    protected $type = 'text';

    public $isAt = false;

    /**
     * 设置消息
     * @param mixed $value 传送的内容
     * @return array|mixed
     */
    public function transform($value)
    {
        list($content) = $value;
        return ['content' => $content];
    }
}
