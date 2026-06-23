<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case Submitted = 'submitted';
    case Reviewing = 'reviewing';
    case Accepted = 'accepted';
    case Waitlisted = 'waitlisted';
    case Rejected = 'rejected';
    case Withdrawn = 'withdrawn';

    public function getLabel(): string
    {
        return __("application.status.{$this->value}");
    }
}
