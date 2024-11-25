<?php

namespace App\Application\Service;

use App\Domain\Model\Task\TaskRepositoryInterface;
use App\Domain\Model\Task\Task;
use App\Domain\Model\ValueObject\TaskName;
use App\Domain\Model\ValueObject\DueDate;
use App\Domain\Model\Task\TaskService;

class CreateTaskUseCase
{
    private TaskRepositoryInterface $taskRepository;
    private TaskService $taskService;

    public function __construct(TaskRepositoryInterface $taskRepository, TaskService $taskService)
    {
        $this->taskRepository = $taskRepository;
        $this->taskService = $taskService;
    }

    public function execute(string $name, \DateTime $dueDate): Task
    {
        $taskName = new TaskName($name);
        $dueDate = new DueDate($dueDate);

        $task = new Task($taskName, $dueDate);

        if ($this->taskService->isOverdue($task)) {
            throw new OverdueTaskException("The task's due date is in the past.");
        }

        $this->taskRepository->save($task);

        return $task;
    }
}
