<?php


namespace diezeel\LaravelFbMessengerApi\Messages\Instagram;


use diezeel\LaravelFbMessengerApi\Messages\Message;

class GeneralMessage extends Message
{
    protected $elements = [];
    protected $image;

    public function __construct($recipient, $payload, $image = null, $tag = null)
    {
        $this->image = $image;
        if (!is_array($payload)) {
            $payload = [$payload];
        }
        foreach ($payload as $item) {
            if (! $item instanceof GeneralMessageElement) {
                $item = $this->makeElement($item);
            }
            $this->addElement($item);
        }
        parent::__construct($recipient, $payload, $tag);
    }

    /**
     * "recipient": {
     *   "id": "<IGSID>"
     *   },
     *   "message": {
     *   "text": "<TEXT>"
     *   },
     * @return array
     */
    function getData()
    {
        $message = [
            'recipient' => [
                'id' => $this->recipient,
            ],
            'message' => [
                'attachment' => [
                    'type' => 'image',
                    'payload' => [
                        'url' => $this->text
                    ]
                ]
            ],
        ];
        if ($this->tag) {
            $message['tag'] = $this->tag;
        }
        return $message;
    }

    public function addElement(GeneralMessageElement $element)
    {
        $this->elements[] = $element;
        return $this;
    }

    private function makeElement(
        string $title,
        string $image = null,
        string $subtitle = null,
        string $url = null,
        array $buttons = null
    ) {
        return new GeneralMessageElement($title,$image,$subtitle,$url,$buttons);
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function first()
    {
        return reset($this->elements);
    }

    public function getElementByIndex(int $idx)
    {
        if(array_key_exists($idx,$this->elements)){
            return $this->elements[$idx];
        }
        return null;
    }
}