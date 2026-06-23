<?php

namespace App\Enums;

enum EventStatus: string
{
    case Draft = 'draft';
    case Scheduled = 'scheduled';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    public function getLabel(): string
    {
        return __("event.status.{$this->value}");
    }
}
