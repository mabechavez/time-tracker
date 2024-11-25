<?php

namespace App\Domain\Model\Task;

class TaskService
{
    public function isOverdue(Task $task): bool
    {
        return $task->getDueDate()->isPast();
    }
}
