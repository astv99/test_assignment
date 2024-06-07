<?php
namespace app\models;

class Task extends Event
{
    public const TYPE_CREATED_TASK = 'created_task';
    public const TYPE_COMPLETED_TASK = 'completed_task';
    public const TYPE_UPDATED_TASK = 'updated_task';
    
    private string $type = self::TYPE_CREATED_TASK;
    private string $title;
    private string $description;
    
    public function __construct($id, $type, $date, $title, $description)
    {
        parent::__construct($id, $date);
        $this->type = $type;
        $this->title = $title;
        $this->description = $description;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
    * @return string
    */
    public function getDescription(): string
    {
        return $this->description;
    }
}