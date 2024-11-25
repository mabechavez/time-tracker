<?php

namespace App\Domain\Model\ValueObject;

use InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class TaskName
{
    #[ORM\Column(type: "string")]
    private string $name;

    public function __construct(string $name)
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Task name cannot be empty');
        }

        if (strlen($name) > 255) {
            throw new InvalidArgumentException('Task name cannot be longer than 255 characters');
        }

        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public function equals(TaskName $taskName): bool
    {
        return $this->name === $taskName->getValue();
    }
}
