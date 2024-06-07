<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use \app\helpers\EventListHelper;
use \app\models\Email;
use \app\models\Sms;
use \app\models\Task;

$events = [
    new Task(1, 'created_task', '2021-01-01', 'Task 1', 'Description 1'),
    new Sms(1, 'incoming_sms', '2021-01-01', 'Message 1'),
    new Email(1, 'incoming_email', '2021-01-01', 'Subject 1', 'Body 1'),
];

foreach ($events as $event) {
    echo EventListHelper::getTextByEvent($event) . PHP_EOL;
}
