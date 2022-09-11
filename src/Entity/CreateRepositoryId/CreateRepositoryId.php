<?php

namespace App\Entity\CreateRepositoryId;

use Doctrine\Persistence\ObjectRepository;

class CreateRepositoryId implements CreateRepositoryIdInterface
{
    private array $repositoryId;
    public function __construct()
    {
        $this->repositoryId = [];
    }

    public function create(ObjectRepository $repository): array
    {
        $repositoryAll = $repository->findAll();
        for($i = 0; $i < count($repositoryAll); $i++)
        {
            $this->repositoryId[$repositoryAll[$i]->getId()] = true;
        }
        return $this->repositoryId;
    }
}