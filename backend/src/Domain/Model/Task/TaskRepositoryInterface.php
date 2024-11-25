<?php

namespace App\Domain\Model\Task;

interface TaskRepositoryInterface
{
    public function save(Task $task): void;
    public function find(int $id): ?Task;
}
