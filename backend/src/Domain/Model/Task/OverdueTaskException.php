<?php

namespace App\Domain\Model\Task;

use Exception;

class OverdueTaskException extends Exception
{
    protected $message = 'The task is overdue and cannot be created or modified.';
}
