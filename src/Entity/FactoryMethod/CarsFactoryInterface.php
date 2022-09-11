<?php

namespace App\Entity\FactoryMethod;

use App\Entity\FactoryMethod\Enum\ActionType;
use App\Entity\FactoryMethod\Insert\InsertCars;
use App\Entity\FactoryMethod\Remove\RemoveCars;
use App\Entity\FactoryMethod\Update\UpdateCars;
use Doctrine\Persistence\ObjectManager;

interface CarsFactoryInterface
{
    public function create(ActionType $actionType,ObjectManager $entityManager, array $elementXML, array $repositoryId): UpdateCars|RemoveCars|InsertCars;
}