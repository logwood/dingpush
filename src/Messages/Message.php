<?php

namespace Logwood\DingPush\Messages;

class Message
{
    protected $value;
    protected $type;
    protected $attributes = [];

    /**
     * @var bool @member
     */
    protected $isAt = false;

    /**
     * @var bool  @all
     */
    protected $isAtAll = false;

    /**
     * @var array phone
     */
    protected $atMobiles = [];

    /**
     * Message constructor.
     * @param mixed ...$value args
     * @return null
     */
    public function __construct(...$value)
    {
        $this->value = $value;
    }

    /**
     * instance
     * @return static
     */
    public static function create()
    {
        return new static(...func_get_args());
    }

    /**
     * get message type
     * @return mixed
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @param mixed $value val
     * @return mixed
     */
    protected function transform($value)
    {
        return $value;
    }

    /**
     * @param string $key key
     * @param string $value val
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * @param array $phones connect
     * @return mixed
     */
    public function setAtMobiles($phones)
    {
        if (!$this->isAt) {
            echo 'Notice：not enable @ user config';
        }
        $this->atMobiles = $phones;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $msqArr = [
            'msgtype' => $this->type(),
            $this->type() => array_merge($this->transform($this->value), $this->attributes),
        ];
        if ($this->isAt) {
            $msqArr['at'] = [
                'atMobiles' => $this->atMobiles,
                'isAtAll' => $this->isAtAll
            ];
        }
        return $msqArr;
    }
}
