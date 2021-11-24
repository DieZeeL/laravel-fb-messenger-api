<?php


namespace diezeel\LaravelFbMessengerApi\Buttons;


class PostbackButton extends Button
{

    protected string $type = 'postback';

    public function getData(): array
    {
        return [
            'type' => $this->type,
            'title' => $this->text,
            'payload' => $this->payload
        ];
    }
}