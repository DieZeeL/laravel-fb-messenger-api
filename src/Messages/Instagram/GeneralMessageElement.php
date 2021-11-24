<?php


namespace diezeel\LaravelFbMessengerApi\Messages\Instagram;


use diezeel\LaravelFbMessengerApi\Buttons\Button;
use diezeel\LaravelFbMessengerApi\Contracts\MessagesContract;
use diezeel\LaravelFbMessengerApi\Messages\Message;

class GeneralMessageElement implements MessagesContract
{
    protected $image;
    protected $title;
    protected $subtitle;
    protected $url;
    protected $buttons = [];

    public function __construct(
        string $title,
        string $image = null,
        string $subtitle = null,
        string $url = null,
        array $buttons = null
    )
    {
        $this->image = $image;
        $this->buttons = $buttons;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->url = $url;
    }

    function getData()
    {
        $payload =  [
            'title' => $this->title,
        ];
        if($this->image !== null)
            $payload['image_url'] = $this->image;
        if($this->subtitle !== null)
            $payload['subtitle'] = $this->subtitle;
        if($this->url !== null)
            $payload['default_action'] = [
                'type' => 'web_url',
                'url' => $this->url
            ];

        if(!empty($this->buttons)){
            $buttons = array_slice($this->buttons,0,3);
            $outputButtons = [];
            foreach ($buttons as $button){
                $outputButtons[] = $button->getData();
            }
            $payload['buttons'] = $outputButtons;
        }
        return $payload;
    }

    function addButton(Button $button): GeneralMessageElement
    {
        $this->buttons[] = $button;
        return $this;
    }

    function addImage($image): string
    {
        $this->image = $image;
        return $this;
    }

    function addSubtitle($text): string
    {
        $this->subtitle = $text;
        return $this;
    }

    function addUrl($url): string
    {
        $this->url = $url;
        return $this;
    }
}