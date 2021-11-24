<?php


namespace diezeel\LaravelFbMessengerApi\Messages\Instagram;


use diezeel\LaravelFbMessengerApi\Messages\Message;

class TextMessage extends Message
{

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
                'text' => $this->text
            ]
        ];
        if ($this->tag) {
            $message['tag'] = $this->tag;
        }
        return $message;
    }
}