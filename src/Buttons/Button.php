<?php


namespace diezeel\LaravelFbMessengerApi\Buttons;


use diezeel\LaravelFbMessengerApi\Contracts\ButtonsContract;

abstract class Button implements ButtonsContract
{
    protected $text;

    protected $payload;

    public function __construct($text, $payload)
    {
        $this->text = $text;
        $this->payload = $payload;
    }

    abstract public function getData(): array;
}