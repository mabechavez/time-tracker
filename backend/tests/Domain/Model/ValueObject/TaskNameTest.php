<?php

namespace App\Tests\Domain\Model\ValueObject;

use App\Domain\Model\ValueObject\TaskName;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class TaskNameTest extends TestCase
{
    public function testValidTaskName()
    {
        $taskName = new TaskName('My Task');
        $this->assertEquals('My Task', $taskName->getValue());
    }

    public function testEmptyTaskName()
    {
        $this->expectException(InvalidArgumentException::class);
        new TaskName('');
    }

    public function testLongTaskName()
    {
        $this->expectException(InvalidArgumentException::class);
        new TaskName(str_repeat('a', 256));
    }
}
