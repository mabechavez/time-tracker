<?php

namespace App\Domain\Model\Task;

use App\Domain\Model\ValueObject\TaskName;
use App\Domain\Model\ValueObject\DueDate;

class TaskAggregate
{
    private Task $task;
    private DueDate $dueDate;

    public function __construct(Task $task, DueDate $dueDate)
    {
        $this->task = $task;
        $this->dueDate = $dueDate;
    }

    public function changeDueDate(\DateTime $dueDate): void
    {
        $this->task->changeDueDate($dueDate);
    }

    public function getTask(): Task
    {
        return $this->task;
    }
}
