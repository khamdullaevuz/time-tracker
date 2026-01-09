<?php

namespace App\Filament\Pages;

use App\Enums\TaskStatus;
use App\Enums\UserRole;
use App\Models\Task;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class TasksKanbanBoard extends KanbanBoard
{
    protected static string $model = Task::class;
    protected static string $statusEnum = TaskStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-columns';

    protected static ?string $title = 'Kanban Board';

    public function records(): Collection
    {
        $authUser = auth()->user();
        return Task::ordered()
            ->when($authUser->role == UserRole::User, fn ($query) => $query->where('user_id', $authUser->id))
            ->get();
    }

    public function onStatusChanged(int|string $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        Task::find($recordId)->update(['status' => $status]);
        Task::setNewOrder($toOrderedIds);
    }

    public function onSortChanged(int|string $recordId, string $status, array $orderedIds): void
    {
        Task::setNewOrder($orderedIds);
    }
}
