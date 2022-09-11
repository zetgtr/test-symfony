<?php

namespace App\Entity\CreateRepositoryId;

use Doctrine\Persistence\ObjectRepository;

interface CreateRepositoryIdInterface
{
    public function create(ObjectRepository $repository): array;
}