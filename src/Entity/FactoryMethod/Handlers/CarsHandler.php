<?php

namespace App\Entity\FactoryMethod\Handlers;
use App\Entity\FactoryMethod\CarsFactoryInterface;
use App\Entity\FactoryMethod\Enum\ActionType;
use App\Entity\FactoryMethod\Response\CarsResponse;
use Doctrine\Persistence\ObjectManager;



class CarsHandler
{
    public function __construct(private readonly CarsFactoryInterface $carsFactory)
    {

    }

    public function handler(string $request, ObjectManager $entityManager, array $elementXML, array $repositoryId) : CarsResponse
    {
        return new CarsResponse(
            $this->carsFactory->create(
                ActionType::getActionTypeByValue($request),
                $entityManager,
                $elementXML,
                $repositoryId
            )
        );
    }
}