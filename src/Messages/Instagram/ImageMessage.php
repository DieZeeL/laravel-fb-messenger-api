<?php


namespace diezeel\LaravelFbMessengerApi\Messages\Instagram;


use diezeel\LaravelFbMessengerApi\Messages\Message;

class ImageMessage extends Message
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
}