<?php

namespace App\Enums;

use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum TaskStatus: string
{
    use IsKanbanStatus;

    case New = 'new';
    case InProgress = 'in_progress';
    case Done = 'done';

    public function getTitle(): string
    {
        return __($this->label());
    }

    public function label(): string
    {
        return match ($this) {
            self::New => 'New',
            self::InProgress => 'In Progress',
            self::Done => 'Done',
        };
    }
}
