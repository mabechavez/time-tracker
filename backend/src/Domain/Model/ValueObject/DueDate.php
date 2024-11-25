<?php

namespace App\Domain\Model\ValueObject;

use InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class DueDate
{
    #[ORM\Column(type: "datetime")]
    private \DateTime $dueDate;

    public function __construct(\DateTime $dueDate)
    {
        if ($dueDate < new \DateTime()) {
            throw new InvalidArgumentException('Due date cannot be in the past');
        }

        $this->dueDate = $dueDate;
    }

    public function getValue(): \DateTime
    {
        return $this->dueDate;
    }

    public function equals(DueDate $dueDate): bool
    {
        return $this->dueDate == $dueDate->getValue();
    }
}
