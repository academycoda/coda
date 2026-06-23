<?php

namespace App\Enums;

enum CourseStatus: string
{
    case Draft = 'draft';
    case Listed = 'listed';
    case Open = 'open';
    case Closed = 'closed';
    case Active = 'active';
    case Ended = 'ended';

    public function getLabel(): string
    {
        return __("course.status.{$this->value}");
    }
}
