<?php
namespace app\models;

class Sms extends Event
{
    public const TYPE_INCOMING_SMS = 'incoming_sms';
    public const TYPE_OUTGOING_SMS = 'outgoing_sms';
    
    private string $type = self::TYPE_INCOMING_SMS;
    private string $message;

    public function __construct($id, $type, $date, $message)
    {
        parent::__construct($id, $date);
        $this->type = $type;
        $this->message = $message;
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
    public function getMessage(): string
    {
        return $this->message;
    }
}