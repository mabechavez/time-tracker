<?php

namespace App\Domain\Model\Task;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Model\ValueObject\TaskName;
use App\Domain\Model\ValueObject\DueDate;

#[ORM\Entity]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Embedded(class: TaskName::class)]
    private TaskName $name;

    #[ORM\Embedded(class: DueDate::class)]
    private DueDate $dueDate;

    public function __construct(TaskName $name, DueDate $dueDate)
    {
        $this->name = $name;
        $this->dueDate = $dueDate;
    }

    // Métodos getter y setter si es necesario
}