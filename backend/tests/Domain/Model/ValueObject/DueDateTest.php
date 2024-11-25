<?php

namespace App\Tests\Domain\Model\ValueObject;

use App\Domain\Model\ValueObject\DueDate;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class DueDateTest extends TestCase
{
    public function testValidDueDate()
    {
        $dueDate = new DueDate(new \DateTime('+1 day'));
        $this->assertInstanceOf(\DateTime::class, $dueDate->getValue());
    }

    public function testPastDueDate()
    {
        $this->expectException(InvalidArgumentException::class);
        new DueDate(new \DateTime('-1 day'));
    }
}
