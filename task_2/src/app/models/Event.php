<?php
namespace app\models;

abstract class Event
{
    private int $id;
    private string $date;

    public function __construct($id, $date)
    {
        $this->id = $id;
        $this->date = $date;
    }

    /**
    * @return string
    */
    abstract public function getType(): string;

    /**
    * @return int
    */
    public function getId(): int
    {
        return $this->id;
    }

    /**
    * @return string
    */
    public function getDate(): string
    {
        return $this->date;
    }

}