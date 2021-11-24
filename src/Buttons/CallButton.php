<?php


namespace diezeel\LaravelFbMessengerApi\Buttons;


class CallButton extends Button
{
    protected string $type = 'phone_number';

    public function getData(): array
    {
        return [
            'type' => $this->type,
            'title' => $this->text,
            'payload' => $this->payload
        ];
    }
}