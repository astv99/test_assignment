<?php
namespace app\models;

class Call extends Event
{
    public const TYPE_INCOMING_CALL = 'incoming_call';
    public const TYPE_OUTGOING_CALL = 'outgoing_call';
    
    private string $type = self::TYPE_INCOMING_CALL;
    private string $number;

    public function __construct($id, $type, $date, $number)
    {
        parent::__construct($id, $date);
        $this->type = $type;
        $this->number = $number;
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
    public function getNumber(): string
    {
        return $this->number;
    }
}