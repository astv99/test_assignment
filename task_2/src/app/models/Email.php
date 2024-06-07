<?php
namespace app\models;

class Email extends Event
{
    public const TYPE_INCOMING_EMAIL = 'incoming_email';
    public const TYPE_OUTGOING_EMAIL = 'outgoing_email';
    
    private string $type = self::TYPE_INCOMING_EMAIL;
    private string $subject;
    private string $body;

    public function __construct($id, $type, $date, $subject, $body)
    {
        parent::__construct($id, $date);
        $this->type = $type;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
    * @return string
    */
    public function getType(): string
    {
        return $this->type;
    }

    /**
    * @return string
    */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
    * @return string
    */
    public function getBody(): string
    {
        return $this->body;
    }
}