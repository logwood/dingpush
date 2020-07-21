<?php
namespace Logwood\DingPush;

use GuzzleHttp\Client;

class MessageRobot {
    /**
     * BASE_PUSH_URL
     * @var string
     */
    const BASE_PUSH_URL = 'https://oapi.dingtalk.com/robot/send?access_token=';

    /**
     * bot AccessToken
     *
     * @var string
     */
    protected $accessToken;

    /**
     * add sign
     *
     * @var string
     */
    protected $secret;

    /**
     * @param string      $accessToken
     * @param string|null $secret
     */
    public function __construct($accessToken, $secret = null)
    {
        $this->accessToken = $accessToken;
        $this->secret = $secret;
    }

    /**
     * @param string      $accessToken 密钥
     * @param string|null $secret 加签
     *
     * @return self
     */
    public static function create($accessToken, $secret = null)
    {
        return new static($accessToken, $secret);
    }

    /**
     * 发送消息
     *
     * @param array $message 消息内网
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($message)
    {
        $url = self::BASE_PUSH_URL . $this->accessToken;
        if ($this->secret) {
            $timestamp = time().'000';
            $url .= sprintf(
                '&sign=%s&timestamp=%s',
                urlencode(base64_encode(hash_hmac('sha256', $timestamp . "\n" . $this->secret, $this->secret, true))),
                $timestamp
            );
        }
        $client = new Client();
        return $client->request(
            'POST',
            $url,
            ['json' => $message]
        );
    }
}
