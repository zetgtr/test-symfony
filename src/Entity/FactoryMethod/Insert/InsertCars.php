<?php

namespace App\Entity\FactoryMethod\Insert;

use App\Entity\Cars;
use Doctrine\Persistence\ObjectManager;

class InsertCars implements InsertCarsInterface
{
    private Cars $cars;
    public function __construct(
        private readonly ObjectManager $entityManager,
        private readonly array $elementXML
    )
    {
        $this->cars = new Cars();
    }

    public function flush(): void
    {
        $this->insert();
        $this->entityManager->flush();
    }

    public function insert(): void
    {
        $this->cars->setId($this->elementXML['id']);
        $this->cars->setMark($this->elementXML['mark']);
        $this->cars->setModel($this->elementXML['model']);
        $this->cars->setGeneration($this->elementXML['generation']);
        $this->cars->setYear($this->elementXML['year']);
        $this->cars->setRun($this->elementXML['run']);
        $this->cars->setColor($this->elementXML['color']);
        $this->cars->setType($this->elementXML['body-type']);
        $this->cars->setEngine($this->elementXML['engine-type']);
        $this->cars->setTransmission($this->elementXML['transmission']);
        $this->cars->setGear($this->elementXML['gear-type']);
        $this->cars->setGenerationId($this->elementXML['generation_id']);

        $this->entityManager->persist($this->cars);
    }
}