<?php


namespace diezeel\LaravelFbMessengerApi\Messages;


abstract class Message
{
    const TAG_HUMAN_AGENT = "HUMAN_AGENT";

    protected $recipient;

    protected $text;

    protected $tag;

    public function __construct($recipient, $text, $tag = null)
    {
        $this->recipient = $recipient;
        $this->text = $text;
        $this->tag = $tag;
    }

    abstract function getData();

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}