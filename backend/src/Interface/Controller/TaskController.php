<?php

namespace App\Application\Controller;

use App\Domain\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    #[Route('/tasks/create', name: 'create_task')]
    public function createTask(Request $request): Response
    {
        $name = $request->get('name');
        $dueDate = new \DateTime($request->get('dueDate'));

        $task = $this->taskService->createTask($name, $dueDate);

        return new Response('Task created with name: ' . $task->getName()->getValue());
    }
}
