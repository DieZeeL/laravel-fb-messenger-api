<?php


namespace diezeel\LaravelFbMessengerApi;


use diezeel\LaravelFbMessengerApi\Contracts\MessengerContract;
use Facebook\Facebook;

abstract class Messenger implements MessengerContract
{

    /**
     * Request type GET
     */
    const TYPE_GET = "get";

    /**
     * Request type POST
     */
    const TYPE_POST = "post";

    /**
     * Request type DELETE
     */
    const TYPE_DELETE = "delete";

    /**
     * FB Messenger API version
     *
     * @var string
     */
    protected $apiVersion = "v2.12";

    /**
     * @var null|string
     */
    protected $token = null;

    /**
     * @var null|string
     */
    protected $appsecret_proof = null;

    /**
     * @var Facebook|null;
     */
    protected $api = null;

    /**
     * @var array;
     */
    private $config;

    /**
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->api = new Facebook($config);
    }

    public function newInstance($config): Messenger
    {
        $new_config = array_merge($this->config, $config);
        return new static($new_config);
    }

    public function setToken($token): Messenger
    {
        $this->token = $token;
        return $this;
    }

    public function appsecret_proof($token = null): string
    {
        return hash_hmac('sha256', $token ?? $this->token, $this->config['app_secret']);
    }
}