<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Model\Task\Task;
use App\Domain\Model\Task\TaskRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineTaskRepository extends ServiceEntityRepository implements TaskRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function save(Task $task): void
    {
        $this->_em->persist($task);
        $this->_em->flush();
    }

    /**
     * @param mixed $id
     * @param LockMode|int|null $lockMode
     * @param int|null $lockVersion
     * @return Task|null
     */
    public function find($id, $lockMode = null, $lockVersion = null): ?Task
    {
        return parent::find($id, $lockMode, $lockVersion);
    }
}
