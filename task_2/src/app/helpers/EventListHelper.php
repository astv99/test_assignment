<?php
namespace app\helpers;

use app\models\Event;
use app\models\Call;
use app\models\Email;
use app\models\Task;
use app\models\Sms;

class EventListHelper
{
    /**
    * @param Event $event
    * @return string
    */
    public static function getTextByEvent(Event $event): string
    {
        switch ($event->getType()) {
            case Task::TYPE_CREATED_TASK:
            case Task::TYPE_COMPLETED_TASK:
            case Task::TYPE_UPDATED_TASK:
                return "Title: " . $event->getTitle() . ". Date: " . $event->getDate();
            case Sms::TYPE_INCOMING_SMS:
            case Sms::TYPE_OUTGOING_SMS:
                return "Message: " . $event->getMessage() . ". Date: " . $event->getDate();
            case Email::TYPE_INCOMING_EMAIL:
            case Email::TYPE_OUTGOING_EMAIL:
                return "Subject: " . $event->getSubject() . ". Date: " . $event->getDate();
            case Call::TYPE_INCOMING_CALL:
            case Call::TYPE_OUTGOING_CALL:
                return "Number: " . $event->getNumber() . ". Date: " . $event->getDate();
            default:
                return $event->getType() . " event";
        }
    }
}