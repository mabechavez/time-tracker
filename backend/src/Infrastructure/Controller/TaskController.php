<?php

namespace App\Infrastructure\Controller;

use App\Application\Service\CreateTaskUseCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Domain\Model\Task\OverdueTaskException;

class TaskController
{
    private CreateTaskUseCase $createTaskUseCase;

    public function __construct(CreateTaskUseCase $createTaskUseCase)
    {
        $this->createTaskUseCase = $createTaskUseCase;
    }

    #[Route('/tasks', name: 'create_task', methods: ['POST'])]
    public function create(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $name = $data['name'];
            $dueDate = new \DateTime($data['dueDate']);

            $task = $this->createTaskUseCase->execute($name, $dueDate);

            return new Response('Task created successfully!', Response::HTTP_CREATED);
        } catch (OverdueTaskException $e) {
            return new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return new Response('An error occurred: ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
