<?php

namespace App\Enums;

enum EventType: string
{
    case Lecture = 'lecture';
    case Session = 'session';
    case Workshop = 'workshop';

    public function getLabel(): string
    {
        return __("event.type.{$this->value}");
    }
}
