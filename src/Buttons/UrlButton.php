<?php


namespace diezeel\LaravelFbMessengerApi\Buttons;


class UrlButton extends Button
{

    protected string $type = 'web_url';

    protected $webview_height_ratio = 'full';

    public function __construct($text, $payload, $webview_height_ratio = 'full')
    {
        $this->webview_height_ratio = $webview_height_ratio;
        parent::__construct($text, $payload);
    }


    public function getData(): array
    {
        return [
            'type' => $this->type,
            'url' => $this->payload,
            'title' => $this->text,
            'webview_height_ratio' => $this->webview_height_ratio
        ];
    }
}