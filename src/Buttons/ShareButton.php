<?php


namespace diezeel\LaravelFbMessengerApi\Buttons;


class ShareButton extends Button
{
    protected string $type = 'element_share';

    public function getData(): array
    {
        return [];
    }
}